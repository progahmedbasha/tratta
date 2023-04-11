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
        $indications = Indication::all();
         return view('front.test.test', compact('genders', 'ages', 'weights', 'pregnancy_stages', 'illness_subs','drugs','indications'));
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
        return view('front.test.test-store');
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