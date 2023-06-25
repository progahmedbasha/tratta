<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Age;
use App\Models\WeightGender;
use App\Models\Scr;
use App\Models\CrclRange;
use App\Models\HxDrug;
use App\Models\HxDrugValue;
use App\Models\Kidney;
use App\Models\PredoseVariable;
use App\Models\Predose;
use App\Models\PredoseQuestionRange;
use App\Models\PredoseSecondQuestion;
use App\Models\FourthQuestionScore;
use App\Models\ScorePoint;
use App\Models\PredoseFourthQuestion;

class ConditionAlgorithmController extends Controller
{   
    public function calculator(Request $request)
    {
        $age = Age::where('from', '<=' , $request->age)->where('to', '>=' , $request->age)->first();
        $weight_gender = WeightGender::where('gender_id',$request->gender_id)->where('weight_id',$request->weight_id)->first();
        $avg = ($weight_gender->range_from + $weight_gender->range_to)/2;
        $result = ((140 - $request->age)*$avg)/($request->scr * 72);
        if($request->gender_id == 2)
            $result *= 0.85;
        $scr = $this->scrResult($request->scr,$request->gender_id);
        $calc_result = $this->calculatorResult($result);
        return response()->json(['result' => round($result,2),'scr' => $scr, 'calc_result' => $calc_result, 'age' => $age, 'code' => '200']);
    }

    public function scrResult($scr, $gender) {
        return SCR::with('illnessSub')->where('gender_id',$gender)->where('range_from', '<=', $scr)->where('range_to', '>=', $scr)->first();
    }

    public function calculatorResult($result) {
        return CrclRange::with('illnessSub')->where('range_from', '<=', $result)->where('range_to', '>=', $result)->first();
    }

    public function recheckDrugs(Request $request) {
        $value1 = HxDrugValue::where('value',"value1")->whereIn('drug_id',$request->drug_drug_id)->get()->pluck('hx_drug_id')->unique()->toArray();
        $value2 = HxDrugValue::where('value',"value2")->whereIn('drug_id',$request->drug_drug_id)->get()->pluck('hx_drug_id')->unique()->toArray();
        $hx_ids = array_intersect($value1,$value2);
        $hx = HxDrug::with('interactionSeverity')->whereIn('id',$hx_ids)->get();
        return response()->json(['recheck_results' => $hx, 'code' => '200']);
    }

    public function kidneys() {
        $result = Kidney::with('illnessSub')->first();
        return response()->json(['result' => $result, 'code' => '200']);
    }

    public function preDoseQ(Request $request) {
        $model = "App\Models\\" . $request->model;
        $var = PredoseVariable::where('variableable_type',$model)->where('variableable_id',$request->id)
        ->whereHas('predose',function ($q) use ($request) {
            $q->where('drug_id',$request->drug_id);
        })->first();
        $questions = null;
        if($var != ''){
            $questions = Predose::with('firstQuestions','secondQuestions','thirdQuestions')->find($var->predose_id);
            $questions->load('thirdQuestions.variableable');
            $questions->load(['fourthQuestion' => fn ($query) => $query->whereHas('fourthQuestionScore')]);
        }
        return response()->json(['questions' => $questions, 'code' => '200']);
    }

    public function question2Result(Request $request) {
        //dd($request);
        $result = PredoseQuestionRange::with('illnessSub')->where('variableable_type',PredoseSecondQuestion::class)->where('variableable_id',$request->q2_id)
        ->where('from', '<=', $request->q2_value)->where('to', '>=', $request->q2_value)->first();
        return response()->json(['result' => $result, 'code' => '200']);
    }
    
    public function question4Data(Request $request) {
        $q4 = FourthQuestionScore::with('child')->where('fourth_question_id',$request->id)->whereNull('parent_id')->orderBy('is_sub')->get();
        return response()->json(['question' => $q4, 'code' => '200']);
    }

    function question4result(Request $request) {
        $score = ScorePoint::with('question4Score')->whereIn('fourth_question_score_id',$request->score_id)->first();
        $sum = ScorePoint::whereIn('fourth_question_score_id',$request->score_id)->sum('point');
        $result = PredoseQuestionRange::with('illnessSub')->where('variableable_type',PredoseFourthQuestion::class)
        ->where('variableable_id',$score->question4Score->fourth_question_id)
        ->where('from', '<=', $sum)->where('to', '>=', $sum)->first();
        $variables = ScorePoint::with('variableable')->whereIn('fourth_question_score_id',$request->score_id)->get();
        return response()->json(['result' => $result, 'variables' => $variables, 'code' => '200']);
    }
}