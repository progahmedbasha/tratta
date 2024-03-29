<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Drug;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::where('parent_id', null)->get();
        $parent_categories = Category::where('parent_id', null)->get();
        $category_subs = Category::whereNotNull('parent_id')->with('drug')->get();
     $categories = Category::with('child')->where('parent_id', null)->get();
  $category_child = Category::with('child')->whereHas('child')->where('parent_id', null)->get();
        $category_child->load('child.drug');

        return view('dashboard.basic-data.drug-data', compact('categories','parent_categories','category_subs','category_child'));
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
    public function store(StoreCategoryRequest $request)
    {
        if($request->parent_id ==null){
            $category= new Category;
            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->save();
                $drug= new Drug;
                $drug->code = 0;
                $drug->name  = $category->name;
                $drug->sub_cat_id  = $category->id;
                $drug->save();
        }else{
            $category= new Category;
            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->save();
        }
        return redirect()->back()->with('success','Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Category::with('child')->where('id', $id)->where('parent_id', null)->get();
        $category_child = Category::with('child')->whereHas('child')->where('id', $id)->where('parent_id', null)->get();
        return view('dashboard.basic-data.drug-data-categories', compact('categories','category_child','id'));

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
    public function update(StoreCategoryRequest $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->back()->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success','Category Updated Successfully');
    }
    public function status(Request $request)
    {
         $category = Category::where('id', $request->new_id)->first();
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