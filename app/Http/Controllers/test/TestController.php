<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Drug;
use App\Models\DrugIndication;
use App\Models\Gender;
use App\Models\IllnessSub;
use App\Models\Indication;
use App\Models\PregnancyStage;
use App\Models\Weight;
use App\Models\Variable;
use App\Models\VariableDetail;
use App\Models\Effect;
use App\Models\NoteDose;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders = Gender::all();
        $ages = Age::all();
        $weights = Weight::all();
        $pregnancy_stages = PregnancyStage::all();
        $illness_subs = IllnessSub::all();
        $drugs = Drug::whereHas('variables')->get();
        $drugs_data = Drug::all();
        $indications = Indication::all();
         return view('front.test.test', compact('genders', 'ages', 'weights', 'pregnancy_stages', 'illness_subs','drugs','indications','drugs_data'));
    }
      public function fetch(Request $request)
    {
        // return $request;
        $drug_indications = DrugIndication::where('drug_id', $request->drug_id)->get();
        $html = view('front.test.fetch-drug-indication', compact('drug_indications'))->render();
        return response()->json(['status' => true, 'result' => $html]);
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
        $var = null;
        if(isset($request->indication_id))
        $var = Variable::whereHasMorph(
            'variableable',DrugIndication::class,
            function ($query) use ($request){
                $query->where('variableable_id',$request->indication_id);
            }
        )->first();
        else
        $var = Variable::whereHasMorph(
            'variableable',Drug::class,
            function ($query) use ($request){
                $query->where('variableable_id',$request->drug_id);
            }
        )->first();

        $detail = VariableDetail::where('variable_id',$var->id)->whereHasMorph(
            'optionable',
            [Age::class,Gender::class,Weight::class,PregnancyStage::class,IllnessSub::class,Drug::class],
            function ($query,$type) use ($request){
                if($type === Age::class)
                $query->where('optionable_id',$request->age_id);
                if($type === Gender::class)
                $query->where('optionable_id',$request->gender_id);
                if($type === Weight::class)
                $query->where('optionable_id',$request->weight_id);
                if($type === PregnancyStage::class)
                $query->where('optionable_id',$request->pregnancy_stage_id);
                if($type === IllnessSub::class)
                $query->where('optionable_id',$request->illness_category_id);
                if($type === Drug::class)
                $query->where('optionable_id',$request->drug_drug_id);
            })->get()->pluck('effect_id')->unique();

           
            $effect = null;
            if($detail->count() > 0)
                $effect = Effect::whereIn('id',$detail)->orderBy('number')->first();
            else
                $effect = Effect::find(1);
            $fixed_dose = NoteDose::with('doseMessage')->where('variable_id',$var->id)->where('effect_id',$effect->id)->where('dose_type_id',1)->first();

        return view('front.test.test-store',compact('fixed_dose'));
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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}