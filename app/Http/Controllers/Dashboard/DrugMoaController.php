<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DrugMoa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DrugMoaController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $moa = new DrugMoa;
        $moa->drug_id = $request->drug_id;
        $moa->text = $request->text;
        $moa->save();
        return redirect()->back()->with('success','Moa Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $moa= DrugMoa::findOrFail($id);
        $moa->drug_id = $request->drug_id;
        $moa->text = $request->text;
        $moa->save();
        return redirect()->back()->with('success','Moa Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $moa= DrugMoa::findOrFail($id);
        $moa->delete();
        return redirect()->back()->with('success','Moa Deleted Successfully');
    }
}