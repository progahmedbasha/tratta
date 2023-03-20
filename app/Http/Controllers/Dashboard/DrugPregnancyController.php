<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\DrugIndication;
use App\Models\DrugPregnancy;
use App\Models\Effect;
use App\Models\NursingSafetyCategory;
use App\Models\PregnancyStage;
use App\Models\Variable;
use Illuminate\Http\Request;

class DrugPregnancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $variable_code = Variable::findOrFail($id);
        $drug_code = Drug::where('id', $variable_code->variableable_id)->first();
        $indication_code = DrugIndication::where('id', $variable_code->variableable_id)->first();
        $effects = Effect::get();
        $prgnancies = DrugPregnancy::where('variable_id', $id)->get();
        $pregnancy_stages = PregnancyStage::get();
        $prganancy_safties = NursingSafetyCategory::get();
        return view('dashboard.drug-prgnancy.drug-prgnancy', compact('id','variable_code','drug_code','indication_code','effects','prgnancies','pregnancy_stages','prganancy_safties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $drug_pregnancy = new DrugPregnancy;
        $drug_pregnancy->drug_id = $request->drug_id;
        $drug_pregnancy->effect_id = $request->effect_id;
        $drug_pregnancy->pregnancy_stage_id = $request->pregnancy_stage_id;
        $drug_pregnancy->pregnancy_safety_id = $request->pregnancy_safety_id;
        $drug_pregnancy->note = $request->note;
        $drug_pregnancy->save();
        return redirect()->back()->with('success','Pregnancy Added Successfully');
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
        $drug_pregnancy = DrugPregnancy::findOrFail($id);
        $drug_pregnancy->drug_id = $request->drug_id;
        $drug_pregnancy->effect_id = $request->effect_id;
        $drug_pregnancy->pregnancy_stage_id = $request->pregnancy_stage_id;
        $drug_pregnancy->pregnancy_safety_id = $request->pregnancy_safety_id;
        $drug_pregnancy->note = $request->note;
        $drug_pregnancy->save();
        return redirect()->back()->with('success','Pregnancy Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}