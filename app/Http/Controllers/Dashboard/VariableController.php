<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Category;
use App\Models\Drug;
use App\Models\DrugIndication;
use App\Models\Effect;
use App\Models\Gender;
use App\Models\IllnessCategory;
use App\Models\PregnancyStage;
use App\Models\Variable;
use App\Models\VariableDetail;
use App\Models\Weight;
use Illuminate\Http\Request;

class VariableController extends Controller
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
        $variable_code = Variable::where('id', $id)->first();
        $drug_code = Drug::where('id', $variable_code->drug_id)->first();
        $indication_code = DrugIndication::where('id', $variable_code->drug_id)->first();
        $effects = Effect::all();
        // ages
        $age_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\Age')->get()->pluck('optionable_id');
        $ages = Age::whereNotIn('id', $age_existe)->get();
        // weights
        $weight_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\Weight')->get()->pluck('optionable_id');
        $weights = Weight::whereNotIn('id', $weight_existe)->get();
        // genders
        $gender_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\Gender')->get()->pluck('optionable_id');
        $genders = Gender::whereNotIn('id', $gender_existe)->get();
        // pregnancy stage
        $pregnancy_stage_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\PregnancyStage')->get()->pluck('optionable_id');
        $pregnancy_stages = PregnancyStage::whereNotIn('id', $pregnancy_stage_existe)->get();
        //illness data
        $category_illness_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\IllnessCategory')->get()->pluck('optionable_id');
        $category_illness_subs = IllnessCategory::whereHas('parent', function ($query) {
            $query->where('parent_id', !null);
             })->whereNotIn('id', $category_illness_existe)->get();
        //drug data
        $drug_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\Drug')->get()->pluck('optionable_id');
        $drugs = Drug::whereNotIn('id', $drug_existe)->get();
        
        // for shows values
        $age_variables = VariableDetail::where('optionable_type', 'App\Models\Age')->where('variable_id', $id)->get();
        // weights
        $weight_variables = VariableDetail::where('optionable_type', 'App\Models\Weight')->where('variable_id', $id)->get();
        // genders
        $gender_variables = VariableDetail::where('optionable_type', 'App\Models\Gender')->where('variable_id', $id)->get();
        // pregnancy_stage
        $pregnancy_stage_variables = VariableDetail::where('optionable_type', 'App\Models\PregnancyStage')->where('variable_id', $id)->get();
        // illness_data 
        $illness_data_variables = VariableDetail::where('optionable_type', 'App\Models\IllnessCategory')->where('variable_id', $id)->get();
        //drug
        $drug_variables = VariableDetail::where('optionable_type', 'App\Models\Drug')->where('variable_id', $id)->get();
        return view('dashboard.drugs.variable_details_add', compact('id','variable_code','drug_code','indication_code','effects','ages','age_variables',
        'weight_variables','gender_variables','pregnancy_stage_variables',
        'illness_data_variables','genders','weights','pregnancy_stages','category_illness_subs','drugs','drug_variables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $var = null;
        $variable = null;
        if($request->option =="sub_id"){
            $var = DrugIndication::where('id', $request->indication_id)->first();
        }else{
            $var = Drug::where('id', $request->drug_id)->first();
        }
            $variable =   $var->variables()->create(['drug_id' => $request->drug_id]);
        return redirect()->route('variables.show', ['variable'=>$variable->id])->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $variable_code = Variable::findOrFail($id);
        $drug_code = Drug::where('id', $variable_code->drug_id)->first();
        $indication_code = DrugIndication::where('id', $variable_code->drug_id)->first();
        $effects = Effect::all();
        // ages
        $age_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\Age')->get()->pluck('optionable_id');
        $ages = Age::whereNotIn('id', $age_existe)->get();
        // weights
        $weight_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\Weight')->get()->pluck('optionable_id');
        $weights = Weight::whereNotIn('id', $weight_existe)->get();
        // genders
        $gender_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\Gender')->get()->pluck('optionable_id');
        $genders = Gender::whereNotIn('id', $gender_existe)->get();
        // pregnancy stage
        $pregnancy_stage_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\PregnancyStage')->get()->pluck('optionable_id');
        $pregnancy_stages = PregnancyStage::whereNotIn('id', $pregnancy_stage_existe)->get();
        //illness data
        $category_illness_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\IllnessCategory')->get()->pluck('optionable_id');
        $category_illness_subs = IllnessCategory::whereHas('parent', function ($query) {
            $query->where('parent_id', !null);
             })->whereNotIn('id', $category_illness_existe)->get();
             //drugs
        $drug_existe = VariableDetail::where('variable_id', $id)->where('optionable_type', 'App\Models\Drug')->get()->pluck('optionable_id');
        $drugs = Drug::whereNotIn('id', $drug_existe)->get();
        
        // for shows values
        $age_variables = VariableDetail::where('optionable_type', 'App\Models\Age')->where('variable_id', $id)->get();
        // weights
        $weight_variables = VariableDetail::where('optionable_type', 'App\Models\Weight')->where('variable_id', $id)->get();
        // genders
        $gender_variables = VariableDetail::where('optionable_type', 'App\Models\Gender')->where('variable_id', $id)->get();
        // pregnancy_stage
        $pregnancy_stage_variables = VariableDetail::where('optionable_type', 'App\Models\PregnancyStage')->where('variable_id', $id)->get();
        // illness_data 
        $illness_data_variables = VariableDetail::where('optionable_type', 'App\Models\IllnessCategory')->where('variable_id', $id)->get();
        //drugs
        $drug_variables = VariableDetail::where('optionable_type', 'App\Models\Drug')->where('variable_id', $id)->get();
        return view('dashboard.drugs.variable_details_add', compact('id','drug_code','indication_code','variable_code','effects','ages','age_variables',
        'weight_variables','gender_variables','pregnancy_stage_variables',
        'illness_data_variables','genders','weights','pregnancy_stages','category_illness_subs','drugs','drug_variables'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function ageVariable(Request $request)
    {
        $countItems = count($request->age_id);
        for ($i = 0; $i < $countItems; $i++) {
            $var = Age::where('id', $request->age_id[$i])->first();
            $variable = $var->variables()->create([
                'variable_id' => $request->variable_id,
                'effect_id' => $request->effect_id
            ]);
        }
            return redirect()->back()->with('success','Variable Age Added Successfully');
    }
    public function weightVariable(Request $request)
    {
        $countItems = count($request->weight_id);
        for ($i = 0; $i < $countItems; $i++) {
            $var = Weight::where('id', $request->weight_id[$i])->first();
            $variable = $var->variables()->create([
                'variable_id' => $request->variable_id,
                'effect_id' => $request->effect_id
            ]);
        }
            return redirect()->back()->with('success','Variable Weight Added Successfully');
    }
    public function genderVariable(Request $request)
    {
        $countItems = count($request->gender_id);
        for ($i = 0; $i < $countItems; $i++) {
            $var = Gender::where('id', $request->gender_id[$i])->first();
            $variable = $var->variables()->create([
                'variable_id' => $request->variable_id,
                'effect_id' => $request->effect_id
            ]);
        }
            return redirect()->back()->with('success','Variable Gender Added Successfully');
    }
    public function pregnancy_stageVariable(Request $request)
    {
        $countItems = count($request->pregnancy_stage_id);
        for ($i = 0; $i < $countItems; $i++) {
            $var = PregnancyStage::where('id', $request->pregnancy_stage_id[$i])->first();
            $variable = $var->variables()->create([
                'variable_id' => $request->variable_id,
                'effect_id' => $request->effect_id
            ]);
        }
            return redirect()->back()->with('success','Variable Pregnancy Stage Added Successfully');
    }
        public function illness_dataVariable(Request $request)
    {
        $countItems = count($request->illness_category_id);
        for ($i = 0; $i < $countItems; $i++) {
            $var = IllnessCategory::where('id', $request->illness_category_id[$i])->first();
            $variable = $var->variables()->create([
                'variable_id' => $request->variable_id,
                'effect_id' => $request->effect_id
            ]);
        }
            return redirect()->back()->with('success','Variable Illness Category Added Successfully');
    }
    public function drugVariable(Request $request)
    {
         $countItems = count($request->drug_id);
        for ($i = 0; $i < $countItems; $i++) {
            $var = Drug::where('id', $request->drug_id[$i])->first();
            $variable = $var->variableDetails()->create([
                'variable_id' => $request->variable_id,
                'effect_id' => $request->effect_id
            ]);
        }
            return redirect()->back()->with('success','Variable Drug Added Successfully');
    }
}