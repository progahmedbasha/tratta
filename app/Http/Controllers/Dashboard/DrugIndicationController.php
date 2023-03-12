<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DrugIndication\StoreDrugIndicationRequest;
use App\Models\DrugIndication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DrugIndicationController extends Controller
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
    public function store(StoreDrugIndicationRequest $request)
    {
        $drug_indication = new DrugIndication;
        $drug_indication->drug_id = $request->drug_id;
        $drug_indication->indication_id = $request->indication_id;
        $drug_indication->code = random_int(100000, 999999);
        $drug_indication->save();
        return redirect()->back()->with('success','Drug Indication Added Successfully');
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
    public function update(StoreDrugIndicationRequest $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}