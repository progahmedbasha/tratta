<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PregnancySafety\StorePregnancySafetyRequest;
use App\Models\PregnancySafety;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PregnancySafetyController extends Controller
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
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePregnancySafetyRequest $request)
    {
        $safety= new PregnancySafety;
        $safety->type = $request->type;
        $safety->value = $request->value;
        $safety->save();
        return redirect()->route('basic_data')->with('success','Pregnancy Safety Added Successfully');
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
    public function update(StorePregnancySafetyRequest $request, $id)
    {
        $safety= PregnancySafety::findOrFail($id);
        $safety->type = $request->type;
        $safety->value = $request->value;
        $safety->save();
        return redirect()->route('basic_data')->with('success','Pregnancy Safety Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}