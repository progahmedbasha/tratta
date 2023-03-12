<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\NursingSafetyCategory\NursingSafetyCategoryRequest;
use App\Models\NursingSafetyCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NursingSafetyCategoryController extends Controller
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
    public function store(NursingSafetyCategoryRequest $request)
    {
        $nursing_safty= new NursingSafetyCategory;
        $nursing_safty->type = $request->type;
        $nursing_safty->value = $request->value;
        $nursing_safty->save();
        return redirect()->route('basic_data')->with('success','Nursing Safety Category Added Successfully');
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
    public function update(NursingSafetyCategoryRequest $request, $id)
    {
        $nursing_safty= NursingSafetyCategory::findOrFail($id);
        $nursing_safty->type = $request->type;
        $nursing_safty->value = $request->value;
        $nursing_safty->save();
        return redirect()->route('basic_data')->with('success','Nursing Safety Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}