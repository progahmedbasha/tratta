<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\IllnessSub;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IllnessSubController extends Controller
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
        $illness= new IllnessSub;
        $illness->name = $request->name;
        $illness->illness_category_id = $request->illness_category_id;
        $illness->save();
        return redirect()->back()->with('success','Illness Added Successfully');
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
        $illness = IllnessSub::findOrFail($id);
        $illness->name = $request->name;
        $illness->illness_category_id = $request->illness_category_id;
        $illness->save();
        return redirect()->back()->with('success','Illness Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $illness = IllnessSub::findOrFail($id);
        $illness->delete();
        return redirect()->back()->with('success','Illness Updated Successfully');
    }
}