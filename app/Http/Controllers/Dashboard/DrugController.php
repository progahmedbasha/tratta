<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Drug\StoreDrugRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Drug;
use App\Models\DrugFormula;
use App\Models\DrugIndication;
use App\Models\DrugMoa;
use App\Models\DrugPregnancy;
use App\Models\Effect;
use App\Models\Formula;
use App\Models\Indication;
use App\Models\NursingSafetyCategory;
use App\Models\PregnancyStage;
use App\Models\DrugTrade;
use App\Models\Variable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $drugs = Drug::where('code','!=',0)->whenSearch($request->search)->paginate(10);
        return view('dashboard.drugs.drugs', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    //   return  $category_subs = Category::where('parent_id', !null)->with('drug')->get();
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $drug= new Drug;
        $drug->code = random_int(100000, 999999);
        $drug->name  = $request->name ;
        $drug->sub_cat_id  = $request->parent_id ;
        $drug->save();
        return redirect()->back()->with('success','Drug Added Successfully');
 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $drug = Drug::find($id);
        $category_subs = Category::where('parent_id', !null)->with('drug')->get();

        $formula_existe = DrugFormula::where('drug_id', $id)->get()->pluck('formula_id');
        $formulas = Formula::whereNotIn('id', $formula_existe)->get();
        
        $drug_formulas = DrugFormula::where('drug_id', $drug->id)->get();
        
        $indication_existe = DrugIndication::where('drug_id', $id)->get()->pluck('indication_id');
        $indications = Indication::whereNotIn('id', $indication_existe)->get();
        // $indications = Indication::all();
        $drug_indications = DrugIndication::where('drug_id', $drug->id)->get();
        $indication_existe = Variable::where('variableable_type', 'App\Models\DrugIndication')->get()->pluck('variableable_id');
        $variable_indications = DrugIndication::where('drug_id', $id)->whereNotIn('id', $indication_existe)->get();
        
        $variables = Variable::where('drug_id', $drug->id)->get();
        $effects = Effect::get();
        $prgnancies = DrugPregnancy::where('drug_id', $drug->id)->get();
        $pregnancy_stages = PregnancyStage::get();
        $prganancy_safties = NursingSafetyCategory::get();
        $countries = Country::get();
        $trades = DrugTrade::where('drug_id', $drug->id)->get();
        $moa_drugs = DrugMoa::where('drug_id', $drug->id)->get();
        return view('dashboard.drugs.drug_show', compact('drug','category_subs','formulas','drug_formulas','indications','drug_indications',
        'variable_indications','variables','effects','prgnancies','pregnancy_stages','prganancy_safties','countries','trades','moa_drugs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDrugRequest $request, $id)
    {
        $drug= Drug::findOrFail($id);
        $drug->name  = $request->name ;
        // $drug->sub_cat_id  = $request->parent_id ;
        $drug->save();
        return redirect()->back()->with('success','Drug Updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}