<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DrugFormula\StoreDrugFormulaRequest;
use App\Models\DrugFormula;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DrugFormulaController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDrugFormulaRequest $request)
    {
        $drug= new DrugFormula;
        $drug->drug_id = $request->drug_id ;
        $drug->formula_id  = $request->formula_id ;
        $drug->save();
        return redirect()->back()->with('success','Drug Formula Added Successfully');
 
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDrugFormulaRequest $request, $id)
    {
        
    }
    public function destroy($id)
    {
        $formula = DrugFormula::findOrFail($id);
        $formula->delete();
        return redirect()->back()->with('success','Drug Formula Deleted Successfully');
    }

}