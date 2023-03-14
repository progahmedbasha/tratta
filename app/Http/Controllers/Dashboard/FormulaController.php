<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Formula\StoreFormulaRequest;
use App\Models\Formula;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FormulaController extends Controller
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
    public function store(StoreFormulaRequest $request)
    {
        $formula= new Formula;
        $formula->name = $request->name;
        if (request()->icon){
            $filename = time().'.'.request()->icon->getClientOriginalExtension();
            request()->icon->move(public_path('data/drug_formulas'), $filename);
            $formula->icon=$filename;
        }
        $formula->save();
        return redirect()->route('basic_data')->with('success','Formula Added Successfully');
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
    public function update(StoreFormulaRequest $request, $id)
    {
        $formula= Formula::findOrFail($id);
        $formula->name = $request->name;
          if (request()->icon){
            $filename = time().'.'.request()->icon->getClientOriginalExtension();
            request()->icon->move(public_path('data/drug_formulas'), $filename);
            $formula->icon=$filename;
            }
        $formula->save();
        return redirect()->route('basic_data')->with('success','Formula Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}