<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Drug;
use App\Models\FourthQuestionScore;
use App\Models\Gender;
use App\Models\IllnessSub;
use App\Models\Predose;
use App\Models\PredoseFourthQuestion;
use App\Models\PregnancyStage;
use App\Models\ScorePoint;
use App\Models\Weight;
use Illuminate\Http\Request;

class PredoseFourthQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $question = PredoseFourthQuestion::with('predoseQuestionRange')->/*with('fourthQuestionScore', function ($query) {
            return $query->where('parent_id', null);
        })->*/where('predose_id', $id)->first();
       $question->load(['fourthQuestionScore.child.scorePoint','fourthQuestionScore' => fn ($query) => $query->where('parent_id', null) ,'fourthQuestionScore.scorePoint']);
        //return $question;
        $predose_drug_id = Predose::find($id);
        $illness_subs = IllnessSub::all();
        return view('dashboard.predose-questions.forth-question', compact('id','question','predose_drug_id','illness_subs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request; 
        $predose = PredoseFourthQuestion::where('predose_id',$request->predose_id)->first();
        $countItems = count($request->illness_sub_id);
        for ($i = 0; $i < $countItems; $i++) {
            $predose->variablePredoseQuestionRange()->create([
                'from' => $request->from[$i],
                'to' => $request->to[$i],
                'illness_sub_id' => $request->illness_sub_id[$i],
            ]);   
        }
        return redirect()->back()->with('success','First Question Added Successfully');
    }

    public function save_q4_score(Request $request){
        // return $request;
        $predose = PredoseFourthQuestion::where('predose_id',$request->predose_id)->first();
        $score = new FourthQuestionScore;
        $score->fourth_question_id = $predose->id;
         if($request->type =="label")
        {
            $score->score_label = $request->label_score;
            $score->is_sub = false;
        }elseif($request->type =="sub")
        {
            if(isset($request->parent_id))
                 $score->parent_id = $request->parent_id;
            $score->score_label = $request->label_sub;
            $score->is_sub = true;
        }
        $score->save();
        if($request->type =="sub"){
            $var = '';
                 if($request->variable =="ages"){
                    $var = Age::where('id', $request->object_id[$request->variable])->first();
                }else if($request->variable =="weights"){
                    $var = Weight::where('id', $request->object_id[$request->variable])->first();
                }else if($request->variable =="genders"){
                    $var = Gender::where('id', $request->object_id[$request->variable])->first();
                }else if($request->variable =="pregnancy_stages"){
                    $var = PregnancyStage::where('id', $request->object_id[$request->variable])->first();
                }else if($request->variable =="illness"){
                    $var = IllnessSub::where('id', $request->object_id[$request->variable])->first();
                }else if($request->variable =="drugs"){
                    $var = Drug::where('id', $request->object_id[$request->variable])->first();
                }
                $var->variableScorePoint()->create([
                        'fourth_question_score_id' => $score->id,
                        'point' => $request->point
                    ]);
        }
        return redirect()->back()->with('success','First Question Added Successfully');
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
        // return $request;
        $question = FourthQuestionScore::find($id);
        $question->score_label = $request->label_score;
        $question->save();
        $point = ScorePoint::where('fourth_question_score_id', $question->id)->first();
        $point->point = $request->point;
        $point->save();
        return redirect()->back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $predose = PredoseThirdQuestion::findOrFail($id);
        // $predose->delete();
        // return redirect()->back()->with('success','Pre-dose Q Deleted Successfully');
    }
    public function delete_score($id)
    {
        // return $id;
        $question = FourthQuestionScore::find($id);
        $question->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
}