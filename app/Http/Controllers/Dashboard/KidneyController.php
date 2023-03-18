<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kidney;
use Illuminate\Http\Request;

class KidneyController extends Controller
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
    public function store(Request $request)
    {
        $kidney = new Kidney;
        $kidney->text = $request->text;
        $kidney->illness_sub_id = $request->illness_sub_id;
        $kidney->save();
        return redirect()->route('basic_data')->with('success','Kidney Added Successfully');
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
        $kidney= Kidney::findOrFail($id);
        $kidney->text = $request->text;
        $kidney->illness_sub_id = $request->illness_sub_id;
        $kidney->save();
        return redirect()->route('basic_data')->with('success','Kidney Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}