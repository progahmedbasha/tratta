<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\HxDrug;
use App\Models\HxDrugValue;
use App\Models\InteractionSeverity;
use Illuminate\Http\Request;

class HxDrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hx_drugs = HxDrug::get();
        $drugs = Drug::get();
        $interaction_severities = InteractionSeverity::get();
        return view('dashboard.hx_drugs.hx_drugs', compact('hx_drugs','drugs','interaction_severities'));
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
    public function store(Request $request)
    {
        // return $request;
        $hx_drug= new HxDrug;
        $hx_drug->note = $request->note;
        $hx_drug->interaction_severity_id = $request->interaction_severity_id;
        $hx_drug->save();
        $count_value1 = count($request->value1);
        for ($i = 0; $i < $count_value1; $i++) {
            $hx_drug_value1 = new HxDrugValue;
            $hx_drug_value1->drug_id = $request->value1[$i];
            $hx_drug_value1->hx_drug_id = $hx_drug->id;
            $hx_drug_value1->value = "value1";
            $hx_drug_value1->save();
        }
        $count_value2 = count($request->value2);
        for ($e = 0; $e < $count_value2; $e++) {
            $hx_drug_value2 = new HxDrugValue;
            $hx_drug_value2->drug_id = $request->value2[$e];
            $hx_drug_value2->hx_drug_id = $hx_drug->id;
            $hx_drug_value2->value = "value2";
            $hx_drug_value2->save();
        }
        return redirect()->back()->with('success','Hx Drug Added Successfully');
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
        $hx_drug= HxDrug::findOrFail($id);
        $hx_drug->note = $request->note;
        $hx_drug->interaction_severity_id = $request->interaction_severity_id;
        $hx_drug->save();
        return redirect()->back()->with('success','Hx Drug Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hx_drug = HxDrug::find($id);
        $hx_drug->delete();
        return redirect()->back()->with('success','Hx Drug Deleted Successfully');
    }
}