<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\IllnessCategory\StoreIllnessCategoryRequest;
use App\Models\IllnessCategory;
use App\Models\IllnessSub;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IllnessCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $parent_illness_categories = IllnessCategory::where('parent_id', null)->get();
        $category_illness_subs = IllnessCategory::whereHas('parent', function ($query) {
            $query->where('parent_id', null);
             })->with('illnessSub')->get();
             
        $illness_categories = IllnessCategory::get();
        $illness_subs = IllnessSub::whereHas('illnessCategory', function ($query) {
            $query->where('parent_id', null);
             })->get();
    return view('dashboard.basic-data.illness-categories', compact('parent_illness_categories','category_illness_subs','illness_categories','illness_subs'));
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
    public function store(StoreIllnessCategoryRequest $request)
    {
        $category= new IllnessCategory;
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->route('illness_categories.index')->with('success','Illness Category Added Successfully');
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
    public function update(StoreIllnessCategoryRequest $request,$id)
    {
        $category= IllnessCategory::findOrFail($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->route('illness_categories.index')->with('success','Illness Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
        public function status(Request $request)
    {
         $category = IllnessCategory::where('id', $request->new_id)->first();
         if($request->has('active')){
            if($category->active == 1)
            {
                $category->update(['active' => 0]);
                return response()->json(['status' => true]);
            }
              if($category->status ==0)
            {
                $category->update(['active' =>1]);
                return response()->json(['status' => true]);
            }
        }
    }
}