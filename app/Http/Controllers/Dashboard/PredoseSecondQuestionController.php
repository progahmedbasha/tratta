<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\IllnessSub;
use App\Models\Predose;
use App\Models\PredoseQuestionRange;
use App\Models\PredoseSecondQuestion;
use Illuminate\Http\Request;

class PredoseSecondQuestionController extends Controller
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
        $questions = PredoseSecondQuestion::where('predose_id', $id)->get();
        $predose_drug_id = Predose::find($id);
        $illness_subs = IllnessSub::all();
        return view('dashboard.predose-questions.second-question', compact('id','questions','predose_drug_id','illness_subs'));
    }
    public function add_row(Request $request)
    {
        // return $request;
        $number = $request->number;
        $illness_subs = IllnessSub::all();
        $html = view('dashboard.doses.variable-component.second-question-row', compact('number','illness_subs'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $predose = new PredoseSecondQuestion;
        $predose->predose_id = $request->predose_id;
        $predose->label = $request->label;
        $predose->unit = $request->unit;
        $predose->save();
        $countItems = count($request->illness_sub_id);
        for ($i = 0; $i < $countItems; $i++) {
            $var = PredoseSecondQuestion::get();
                foreach($var as $variable ){
                 $variable->variablePredoseQuestionRange()->create([
                        'from' => $request->from[$i],
                        'to' => $request->to[$i],
                        'illness_sub_id' => $request->illness_sub_id[$i],
                    ]);
                }
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
        $predose= PredoseSecondQuestion::findOrFail($id);
        $predose->label = $request->label;
        $predose->unit = $request->unit;
        $predose->save();
        return redirect()->back()->with('success','Second Question Updated Successfully');
    }
    public function second_question_range_update(Request $request, $id)
    {
        $range = PredoseQuestionRange::findOrFail($id);
        $range->from = $request->from;
        $range->to = $request->to;
        $range->illness_sub_id = $request->illness_sub_id;
        $range->save();
        return redirect()->back()->with('success',' Updated Successfully');
    }
    public function second_question_range_delete(Request $request, $id)
    {
        $range = PredoseQuestionRange::findOrFail($id);
        $range->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $predose = PredoseSecondQuestion::findOrFail($id);
        $predose->delete();
        return redirect()->back()->with('success','Pre-dose Q Deleted Successfully');
    }
}