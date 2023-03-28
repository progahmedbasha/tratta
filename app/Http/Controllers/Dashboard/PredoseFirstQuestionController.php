<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\Predose;
use App\Models\PredoseFirstQuestion;
use Illuminate\Http\Request;

class PredoseFirstQuestionController extends Controller
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
        $questions = PredoseFirstQuestion::where('predose_id', $id)->get();
        $predose_drug_id = Predose::find($id);
        return view('dashboard.predose-questions.first-question', compact('id','questions','predose_drug_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $predose = new PredoseFirstQuestion;
        $predose->predose_id = $request->predose_id;
        $predose->text = $request->text;
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
        $predose= PredoseFirstQuestion::findOrFail($id);
        $predose->text = $request->text;
        $predose->save();
        return redirect()->back()->with('success','First Question Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $predose = PredoseFirstQuestion::findOrFail($id);
        $predose->delete();
        return redirect()->back()->with('success','Pre-dose Q Deleted Successfully');
    }
}