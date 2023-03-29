<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Scr\StoreScrRequest;
use App\Models\Scr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScrController extends Controller
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
    public function store(StoreScrRequest $request)
    {
        $scr= new Scr;
        $scr->illness_sub_id = $request->illness_sub_id;
        $scr->gender_id = $request->gender_id;
        $scr->range_from = $request->range_from;
        $scr->range_to = $request->range_to;
        $scr->save();
        return redirect()->route('basic_data')->with('success','Scr Added Successfully');
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
    public function update(StoreScrRequest $request, $id)
    {
        $scr = Scr::findOrFail($id);
        $scr->illness_sub_id = $request->illness_sub_id;
        $scr->gender_id = $request->gender_id;
        $scr->range_from = $request->range_from;
        $scr->range_to = $request->range_to;
        $scr->save();
        return redirect()->route('basic_data')->with('success','Scr Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $scr = Scr::findOrFail($id);
        $scr->delete();
        return redirect()->back()->with('success','Scr Deleted Successfully');
    }
}