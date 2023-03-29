<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeightGender\StoreWeightGenderRequest;
use App\Models\WeightGender;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeightGenderController extends Controller
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
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWeightGenderRequest $request)
    {
        $weight_gender= new WeightGender;
        $weight_gender->weight_id = $request->weight_id;
        $weight_gender->gender_id = $request->gender_id;
        $weight_gender->range_from = $request->range_from;
        $weight_gender->range_to = $request->range_to;
        $weight_gender->save();
        return redirect()->route('basic_data')->with('success','Weight Gender Added Successfully');        
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
    public function update(StoreWeightGenderRequest $request, $id)
    {
        $weight_gender= WeightGender::findOrFail($id);
        $weight_gender->weight_id = $request->weight_id;
        $weight_gender->gender_id = $request->gender_id;
        $weight_gender->range_from = $request->range_from;
        $weight_gender->range_to = $request->range_to;
        $weight_gender->save();
        return redirect()->route('basic_data')->with('success','Weight Gender Updated Successfully');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $weight_gender= WeightGender::findOrFail($id);
        $weight_gender->delete();
        return redirect()->back()->with('success','Weight Gender Deleted Successfully');
    }
}