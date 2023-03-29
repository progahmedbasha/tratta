<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\InteractionSeverity\StoreInteractionSeverityRequest;
use App\Models\InteractionSeverity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InteractionSeverityController extends Controller
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
    public function store(StoreInteractionSeverityRequest $request)
    {
        $serverity= new InteractionSeverity;
        $serverity->type = $request->type;
        $serverity->color  = $request->color;
        $serverity->save();
        return redirect()->route('basic_data')->with('success','Interaction Severity Added Successfully');
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
    public function update(StoreInteractionSeverityRequest $request, $id)
    {
        $serverity = InteractionSeverity::findOrFail($id);
        $serverity->type = $request->type;
        $serverity->color  = $request->color;
        $serverity->save();
        return redirect()->route('basic_data')->with('success','Interaction Severity Updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serverity = InteractionSeverity::findOrFail($id);
        $serverity->delete();
        return redirect()->back()->with('success','Interaction Severity Deleted Successfully'); 
    }
}