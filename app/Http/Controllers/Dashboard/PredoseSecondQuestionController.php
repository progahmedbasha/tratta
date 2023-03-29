<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\IllnessSub;
use App\Models\Predose;
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
        $predose->from = $request->from;
        $predose->to = $request->to;
        $predose->illness_sub_id = $request->illness_sub_id;
        $predose->save();
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
        $predose->from = $request->from;
        $predose->to = $request->to;
        $predose->illness_sub_id = $request->illness_sub_id;
        $predose->save();
        return redirect()->back()->with('success','First Question Updated Successfully');
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