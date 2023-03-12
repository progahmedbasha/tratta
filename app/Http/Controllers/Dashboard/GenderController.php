<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\StoreGenderRequest;
use App\Models\Gender;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     $ages = Gender::all();
    //     $model = GenderResource::collection($ages);
    //     $data["genders"] = $model;
    //    return $this->toJson($this->success_code(),$this->success_msg(),$data);
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
    public function store(StoreGenderRequest $request)
    {
        $gender= new Gender;
        $gender->name = $request->name;
        $gender->save();
        return redirect()->route('basic_data')->with('success','Gender Added Successfully');
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
    public function update(StoreGenderRequest $request, $id)
    {
        $gender= Gender::findOrFail($id);
        $gender->name = $request->name;
        $gender->save();
        return redirect()->route('basic_data')->with('success','Gender Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}