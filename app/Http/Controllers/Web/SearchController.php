<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\DrugTrade;
use App\Models\Drug;
use App\Models\Age;
use App\Models\PregnancyStage;
use App\Models\DrugIndication;
use App\Models\TradeKey;

class SearchController extends Controller
{

    public function index()
    {
        $pregnancy = PregnancyStage::all();
        return view('customer/index',compact('pregnancy'));
    }

    public function search(Request $request)
    {
        $data = [];
        if ($request->search != null) {
            if ($request->type == 1){
                $data = $this->searchByTradeName($request->search);
            }else  if ($request->type == 2){
                $data = $this->searchByCategory($request->search);
            }else {
                $data = $this->searchByKey($request->search);
            }
        }
        return response()->json(['data' => $data, 'code' => '200']);
    }

    public function searchByKey($search)
    {
       $data = Category::whereHas('drug',function ($query) {
        $query->whereHas('drugVariables');
       })->whereNotNull('parent_id')->where('name','like','%'.$search.'%')->take(6)->get();
       return $data;
    }

    public function searchByTradeName($search)
    {
       $data = TradeKey::whereHas('drugTrade',function ($q) {
            $q->whereHas('drug',function ($query) {
                $query->whereHas('drugVariables');
           });
       })->where('name_key','like','%'.$search.'%')->take(6)->get();
       return $data;
    }

    public function searchByCategory($search)
    {
        $data = Category::whereHas('child',function ($q)
        {
            $q->whereHas('drug',function ($query) {
                $query->whereHas('drugVariables');
               });
        })->whereNull('parent_id')->where('name','like','%'.$search.'%')->take(6)->get();
        return $data;
    }

    public function searchDrugs(Request $request)
    {
        $data = [];
        if ($request->type == 1){
            $data = $this->drugByTradeName($request->search_id);
        }else  if ($request->type == 2){
            $data = $this->drugByCategory($request->search_id);
        }else {
            $data = $this->drugByKey($request->search_id);
        }
        //return $data;
        return response()->json(['data' => $data, 'code' => '200']);
    }

    public function drugByKey($id)
    {
       $data = Drug::whereHas('drugVariables')->where('sub_cat_id',$id)->take(10)->get();
       return $data;
    }

    public function drugByTradeName($id)
    {
        $trade = DrugTrade::where('trade_key_id',$id)->get()->pluck('drug_id');
        $data = Drug::with('trade')->whereHas('drugVariables')->whereIn('id',$trade)->take(10)->get();
        return $data;
    }

    public function drugByCategory($id)
    {
        $key = Category::where('parent_id',$id)->get()->pluck('id');
        $data = Drug::whereHas('drugVariables')->whereIn('sub_cat_id',$key)->take(10)->get();
        return $data;
    }

    public function drugIndications(Request $request)
    {
        $drug_indications = DrugIndication::with('indication')->where('drug_id',$request->drug_id)->get();
        return response()->json(['data' => $drug_indications, 'code' => '200']);
    }

}