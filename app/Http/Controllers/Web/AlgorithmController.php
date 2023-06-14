<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Age;
use App\Models\Drug;
use App\Models\DrugIndication;
use App\Models\Gender;
use App\Models\IllnessSub;
use App\Models\Indication;
use App\Models\PregnancyStage;
use App\Models\Weight;
use App\Models\Variable;
use App\Models\VariableDetail;
use App\Models\Effect;
use App\Models\NoteDose;
use App\Models\DrugPregnancy;
use App\Models\WeightGender;

class AlgorithmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders = Gender::all();
        $ages = Age::all();
        $weights = Weight::all();
        $pregnancy_stages = PregnancyStage::all();
        $illness_subs = IllnessSub::all()->take(50);
        $drugs = Drug::whereHas('drugVariables')->get();
        $drugs_data = Drug::all()->take(50);
        return view('front.test.test', compact('genders', 'ages', 'weights', 'pregnancy_stages', 'illness_subs','drugs','drugs_data'));
    }

    public function fetch(Request $request)
    {
        // return $request;
        $drug_indications = DrugIndication::where('drug_id', $request->drug_id)->get();
        $html = view('front.test.fetch-drug-indication', compact('drug_indications'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function dose_note_result(Request $request)
    {
        $var = $this->getVariable($request);
        $detail = $this->getVariableDetail($var->id,$request);
        
        $effect = null;
        $dose_result = null;
        $note_result = null;
        if($detail->count() > 0)
            $effect = Effect::whereIn('id',$detail)->orderBy('number')->first();
        else
            $effect = Effect::find(1);
        
        $dose_result = $this->getDoseAnd($var->id,$effect->id,$request);
        if($dose_result == null)
            $dose_result = $this->getDoseOr($var->id,$effect->id,$request);
        if($dose_result == null)
            $dose_result = $this->getFixedDose($var->id,$effect->id);

        $note_result = $this->getNoteAnd($var->id,$effect->id,$request);
        if($note_result == null)
            $note_result = $this->getNoteOr($var->id,$effect->id,$request);

        return response()->json(['dose_result' => $dose_result, 'note_result' => $note_result, 'code' => '200']);
    }

    public function getVariable($request)
    {
        $var = null;
        if(isset($request->indication_id) && $request->indication_id != null)
            $var = Variable::where('drug_id',$request->drug_id)->whereHasMorph(
                'variableable',DrugIndication::class,
                function ($query) use ($request){
                    $query->where('variableable_id',$request->indication_id);
                }
            )->first();
        else
            $var = Variable::where('drug_id',$request->drug_id)->whereHasMorph(
                'variableable',Drug::class,
                function ($query) use ($request){
                    $query->where('variableable_id',$request->drug_id);
                }
            )->first();

        return $var;
    }

    public function getVariableDetail($variableId,$request)
    {
        $detail = VariableDetail::where('variable_id',$variableId)->whereHasMorph(
            'optionable',
            [Age::class,Gender::class,Weight::class,PregnancyStage::class,IllnessSub::class,Drug::class],
            function ($query,$type) use ($request){
                if($type === Age::class)
                $query->where('optionable_id',$request->age_id);
                if($type === Gender::class)
                $query->where('optionable_id',$request->gender_id);
                if($type === Weight::class)
                $query->where('optionable_id',$request->weight_id);
                if($type === PregnancyStage::class)
                $query->where('optionable_id',$request->pregnancy_stage_id);
                if($type === IllnessSub::class && isset($request->illness_category_id))
                $query->whereIn('optionable_id',$request->illness_category_id);
                if($type === Drug::class && isset($request->drug_drug_id))
                $query->whereIn('optionable_id',$request->drug_drug_id);
            })->get()->pluck('effect_id')->unique();
            return $detail;
    }

    public function getDoseAnd($variableId,$effectId,$request)
    {
        $dose =null; 
        $dose_and = NoteDose::with('doseMessage','effect')->with('noteDoseVariables')->where('variable_id',$variableId)->where('effect_id',$effectId)->where('dose_type_id',2)->orderBy('priority')->get();
        foreach($dose_and as $and){
            $check = $this->checkAnd($and,$request);
           if($check){
                $dose = $and;
                break;
            }
        }
        
        return $dose;
    }

    public function getDoseOr($variableId,$effectId,$request)
    {
        $dose = NoteDose::with('doseMessage','effect')->where('variable_id',$variableId)->where('effect_id',$effectId)->where('dose_type_id',3)
        ->whereHas('noteDoseVariables', function($query) use ($request)
        {
            $query->whereHasMorph(
                'variableable',
                [Age::class,Gender::class,Weight::class,PregnancyStage::class,IllnessSub::class,Drug::class],
                function ($query,$type) use ($request){
                    if($type === Age::class)
                    $query->where('variableable_id',$request->age_id);
                    if($type === Gender::class)
                    $query->where('variableable_id',$request->gender_id);
                    if($type === Weight::class)
                    $query->where('variableable_id',$request->weight_id);
                    if($type === PregnancyStage::class)
                    $query->where('variableable_id',$request->pregnancy_stage_id);
                    if($type === IllnessSub::class && isset($request->illness_category_id))
                    $query->whereIn('variableable_id',$request->illness_category_id);
                    if($type === Drug::class && isset($request->drug_drug_id))
                    $query->whereIn('variableable_id',$request->drug_drug_id);
                });
        })->orderBy('priority')->first();
        return $dose;
    }

    public function getFixedDose($variableId,$effectId)
    {
        $dose = NoteDose::with('doseMessage','effect')->where('variable_id',$variableId)->where('effect_id',$effectId)->where('dose_type_id',1)->first();
        return $dose;
    }

    public function getNoteAnd($variableId,$effectId,$request)
    {
        $dose = [];  
        $dose_and = NoteDose::with('noteMessage')->where('variable_id',$variableId)->where('effect_id',$effectId)->where('dose_type_id',5)->orderBy('priority')->get();
        foreach($dose_and as $i => $and){
            $check = $this->checkAnd($and,$request);
           if($check){
                $dose[$i] = $and;
            }
        }
        
        return $dose;
    }

    public function getNoteOr($variableId,$effectId,$request)
    {
        $dose = NoteDose::with('noteMessage')->where('variable_id',$variableId)->where('effect_id',$effectId)->where('dose_type_id',4)
        ->whereHas('noteDoseVariables', function($query) use ($request)
        {
            $query->whereHasMorph(
                'variableable',
                [Age::class,Gender::class,Weight::class,PregnancyStage::class,IllnessSub::class,Drug::class],
                function ($query,$type) use ($request){
                    if($type === Age::class)
                    $query->where('variableable_id',$request->age_id);
                    if($type === Gender::class)
                    $query->where('variableable_id',$request->gender_id);
                    if($type === Weight::class)
                    $query->where('variableable_id',$request->weight_id);
                    if($type === PregnancyStage::class)
                    $query->where('variableable_id',$request->pregnancy_stage_id);
                    if($type === IllnessSub::class && isset($request->illness_category_id))
                    $query->whereIn('variableable_id',$request->illness_category_id);
                    if($type === Drug::class && isset($request->drug_drug_id))
                    $query->whereIn('variableable_id',$request->drug_drug_id);
                });
        })->orderBy('priority')->get();
        return $dose;
    }

    public function checkAnd($and,$request)
    {
        $check = true;
        foreach($and->noteDoseVariables as $var){
            if($var->variableable_type == Age::class){
                if(!(isset($request->age_id) && $var->variableable_id == $request->age_id))
                $check = false;
            }else if($var->variableable_type == Gender::class){
                if(!(isset($request->gender_id) && $var->variableable_id == $request->gender_id))
                $check = false;
            }else if($var->variableable_type == Weight::class){
                if(!(isset($request->weight_id) && $var->variableable_id == $request->weight_id))
                $check = false;
            }else if($var->variableable_type == PregnancyStage::class){
                if(!(isset($request->pregnancy_stage_id) && $var->variableable_id == $request->pregnancy_stage_id))
                $check = false;
            }else if($var->variableable_type == IllnessSub::class){
                if(!isset($request->illness_category_id) || array_search($var->variableable_id, $request->illness_category_id) === false )
                    $check = false;
                
            }else if($var->variableable_type == Drug::class){
                if(!isset($request->drug_drug_id) || array_search($var->variableable_id, $request->drug_drug_id) === false )
                    $check = false;
            }

            if(!$check)
                break;   
        }

        return $check;
    }

    public function drugPregnancy(Request $request)
    {
        $result = DrugPregnancy::with('safety')->whereHas('drugPregnancyStage', function ($query) use ($request)
        {
            $query->where('pregnancy_stage_id',$request->pregnancy_stage_id);
        })->where('drug_id',$request->drug_id)->first();
        return response()->json(['result' => $result, 'code' => '200']);
    }

    public function calculator(Request $request)
    {
        $age = Age::where('from', '<=' , $request->age)->where('to', '>=' , $request->age)->first();
        $weight_gender = WeightGender::where('gender_id',$request->gender_id)->where('weight_id',$request->weight_id)->first();
        $avg = ($weight_gender->range_from + $weight_gender->range_to)/2;
        $result = ((140 - $request->age)*$avg)/($request->scr * 72);
        if($request->gender_id == 2)
            $result *= 0.85;
        return response()->json(['result' => round($result,2),'age' => $age, 'code' => '200']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}