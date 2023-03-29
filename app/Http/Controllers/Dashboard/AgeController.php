<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Age\StoreAgeRequest;
use App\Models\Age;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AgeController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgeRequest $request)
    {
        $age= new Age;
        $age->name = $request->name;
        $age->from = $request->from;
        $age->to = $request->to;
        $age->save();
        return redirect()->route('basic_data')->with('success','Age Added Successfully');
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
    public function update(StoreAgeRequest $request, $id)
    {
        $age= Age::findOrFail($id);
        $age->name = $request->name;
        $age->from = $request->from;
        $age->to = $request->to;
        $age->save();
        return redirect()->route('basic_data')->with('success','Age Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $age= Age::findOrFail($id);
        $age->delete();
        return redirect()->back()->with('success','Age Deleted Successfully');
    }
}