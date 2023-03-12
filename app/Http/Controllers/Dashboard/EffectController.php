<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Effect\StoreEffectRequest;
use App\Models\Effect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EffectController extends Controller
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
    public function store(StoreEffectRequest $request)
    {
        $effect= new Effect;
        $effect->effect_type = $request->effect_type;
        $effect->number = $request->number;
        $effect->color  = $request->color;
        $effect->save();
        return redirect()->route('basic_data')->with('success','Effect Added Successfully');
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
    public function update(StoreEffectRequest $request, $id)
    {
        $effect= Effect::findOrFail($id);
        $effect->effect_type = $request->effect_type;
        $effect->number = $request->number;
        $effect->color  = $request->color;
        $effect->save();
        return redirect()->route('basic_data')->with('success','Effect Updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}