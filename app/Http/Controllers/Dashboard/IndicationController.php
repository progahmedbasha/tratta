<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Indication\StoreIndicationRequest;
use App\Models\Indication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IndicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indications = Indication::all();
        return view('dashboard.basic-data.indications', compact('indications'));
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
    public function store(StoreIndicationRequest $request)
    {
        $indication= new Indication;
        $indication->indication_title = $request->indication_title;
        $indication->save();
        return redirect()->route('indications.index')->with('success','Indication Added Successfully');

   
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
    public function update(StoreIndicationRequest $request, $id)
    {
        $indication= Indication::findOrFail($id);
        $indication->indication_title = $request->indication_title;
        $indication->save();
        return redirect()->route('indications.index')->with('success','Indication Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}