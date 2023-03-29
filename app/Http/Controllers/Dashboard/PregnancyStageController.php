<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PregnancyStage\StorePregnancyStageRequest;
use App\Models\PregnancyStage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PregnancyStageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     $stage = PregnancyStage::all();
    //     $model = PregnancyStageResource::collection($stage);
    //     $data["stages"] = $model;
    //    return $this->toJson($this->success_code(),$this->success_msg(),$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePregnancyStageRequest $request)
    {
        $stage= new PregnancyStage;
        $stage->pregnancy_stage = $request->pregnancy_stage;
        $stage->save();
        return redirect()->route('basic_data')->with('success','Pregnancy Stage Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
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
    public function update(StorePregnancyStageRequest $request, $id)
    {
        $stage= PregnancyStage::findOrFail($id);
        $stage->pregnancy_stage = $request->pregnancy_stage;
        $stage->save();
        return redirect()->route('basic_data')->with('success','Pregnancy Stage Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stage= PregnancyStage::findOrFail($id);
        $stage->delete();
        return redirect()->back()->with('success','Pregnancy Stage Deleted Successfully');
    }
}