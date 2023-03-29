<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Weight\StoreWeightRequest;
use App\Models\Weight;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     $weight = Weight::all();
    //     $model = WeightResource::collection($weight);
    //     $data["wights"] = $model;
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
    public function store(StoreWeightRequest $request)
    {
        $weight= new Weight;
        $weight->weight = $request->weight;
        $weight->save();
        return redirect()->route('basic_data')->with('success','Weight Added Successfully');
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
    public function update(StoreWeightRequest $request, $id)
    {
        $weight= Weight::findOrFail($id);
        $weight->weight = $request->weight;
        $weight->save();
        return redirect()->route('basic_data')->with('success','Weight Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $weight= Weight::findOrFail($id);
        $weight->delete();
        return redirect()->back()->with('success','Weight Deleted Successfully');
    }
}