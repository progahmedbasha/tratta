<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrclRange\StoreCrclRangeRequest;
use App\Models\CrclRange;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CrclRangeController extends Controller
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
    public function store(StoreCrclRangeRequest $request)
    {
        $crcl_range= new CrclRange;
        $crcl_range->illness_sub_id = $request->illness_sub_id;
        $crcl_range->range_from = $request->range_from;
        $crcl_range->range_to = $request->range_to;
        $crcl_range->save();
        return redirect()->route('basic_data')->with('success','Crcl Range Added Successfully');
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
    public function update(StoreCrclRangeRequest $request, $id)
    {
        $crcl_range= CrclRange::findOrFail($id);
        $crcl_range->illness_sub_id = $request->illness_sub_id;
        $crcl_range->range_from = $request->range_from;
        $crcl_range->range_to = $request->range_to;
        $crcl_range->save();
        return redirect()->route('basic_data')->with('success','Crcl Range Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}