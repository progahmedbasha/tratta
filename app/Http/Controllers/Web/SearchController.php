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
use App\Models\IllnessSub;

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
       })->whereHas('parent',function ($query) {
            $query->where('active',0);
       })->whereNotNull('parent_id')->where('name','like','%'.$search.'%')->take(6)->get();
       return $data;
    }

    public function searchByTradeName($search)
    {
       $data = TradeKey::whereHas('drugTrade',function ($q) {
            $q->whereHas('drug',function ($query) {
                $query->whereHas('drugVariables')->whereHas('category',function ($cat_q){
                    $cat_q->whereHas('parent',function ($q) {
                        $q->where('active',0);
                });
           });
        });
       })->where('name_key','like','%'.$search.'%')->take(6)->get();
       return $data;
    }

    public function searchByCategory($search)
    {
        $data = Category::where('active',0)->whereHas('child',function ($q)
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
        $data = Drug::whereHas('trade',function ($query) use ($id)
        {
            $query->where('trade_key_id',$id);
        })->with('trade',function ($query) use ($id)
        {
            $query->where('trade_key_id',$id);
        })->whereHas('drugVariables')->take(10)->get();
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

    public function searchIllness(Request $request)
    {
        $data = IllnessSub::where('name','like','%'.$request->search.'%')->where(function ($data_q) {
            $data_q->whereHas('illnessCategory',function ($query){
                $query->where('active',0);
            })->whereDoesntHave('illnessCategory',function ($query) {
                $query->whereHas('parent',function ($q) {
                    $q->where('active',1);
                });
            });
        });
        if($request->illness_list != null)
            $data = $data->whereNotIn('id',$request->illness_list);
        $data = $data->take(5)->get()->unique();
        return response()->json(['data' => $data, 'code' => '200']);
    }

    public function searchDrugDrugs(Request $request)
    {
        $data = Drug::where('name','like','%'.$request->search.'%')
        ->whereHas('category',function ($query){
            $query->whereHas('parent',function ($q) {
                $q->where('active',0);
            });
        });
        if($request->drug_list != null)
            $data = $data->whereNotIn('id',$request->drug_list);
        $data = $data->take(5)->get();
        return response()->json(['data' => $data, 'code' => '200']);
    }

    function pregnancyStage() {
        $stages = PregnancyStage::all();
        return response()->json(['stages' => $stages, 'code' => '200']);
    }

}