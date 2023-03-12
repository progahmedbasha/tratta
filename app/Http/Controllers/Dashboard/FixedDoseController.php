<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Effect;
use App\Models\FixedDose;
use Illuminate\Http\Request;

class FixedDoseController extends Controller
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
        $effects = Effect::all();
        $fixed_doses = FixedDose::where('variable_id', $id)->get();
          return view('dashboard.fixed-doses.fixed-doses', compact('id','effects','fixed_doses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fixed_dose = new FixedDose;
        $fixed_dose->variable_id = $request->variable_id;
        $fixed_dose->effect_id = $request->effect_id;
        $fixed_dose->recommended_dosage = $request->recommended_dosage;
        $fixed_dose->dosage_note = $request->dosage_note;
        $fixed_dose->titration_note = $request->titration_note;
        $fixed_dose->save();
        return redirect()->back()->with('success','Fixed Dose Added Successfully');
    }
public function update(Request $request, $id)
    {
        $fixed_dose = FixedDose::findOrFail($id);
        $fixed_dose->variable_id = $request->variable_id;
        // $fixed_dose->effect_id = $request->effect_id;
        $fixed_dose->recommended_dosage = $request->recommended_dosage;
        $fixed_dose->dosage_note = $request->dosage_note;
        $fixed_dose->titration_note = $request->titration_note;
        $fixed_dose->save();
        return redirect()->back()->with('success','Fixed Dose Updated Successfully');
    }

}