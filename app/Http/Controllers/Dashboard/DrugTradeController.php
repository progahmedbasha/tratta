<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DrugTrade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DrugTradeController extends Controller
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
        $trade= new DrugTrade;
        $trade->drug_id = $request->drug_id;
        $trade->country_id = $request->country_id;
        $trade->trade_key_id = $request->name_key;
        $trade->name_sub = $request->name_sub;
        $trade->save();
        return redirect()->back()->with('success','Trade Added Successfully');
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
        $trade= DrugTrade::findOrFail($id);
        $trade->drug_id = $request->drug_id;
        $trade->country_id = $request->country_id;
        $trade->trade_key_id = $request->name_key;
        $trade->name_sub = $request->name_sub;
        $trade->save();
        return redirect()->back()->with('success','Trade Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trade = DrugTrade::findOrFail($id);
        $trade->delete();
        return redirect()->back()->with('success','Trade Deleted Successfully');
    }
}