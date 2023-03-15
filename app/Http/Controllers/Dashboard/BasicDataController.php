<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Age;
use App\Models\Category;
use App\Models\Color;
use App\Models\CrclRange;
use App\Models\Effect;
use App\Models\Formula;
use App\Models\Gender;
use App\Models\IllnessCategory;
use App\Models\IllnessSub;
use App\Models\Indication;
use App\Models\InteractionSeverity;
use App\Models\NursingSafetyCategory;
use App\Models\PregnancySafety;
use App\Models\PregnancyStage;
use App\Models\Scr;
use App\Models\Weight;
use App\Models\WeightGender;
use Illuminate\Http\Request;

class BasicDataController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $categories = Category::where('parent_id', null)->get();
        $parent_categories = Category::where('parent_id', null)->get();
        $category_subs = Category::where('parent_id', !null)->with('drug')->get();
        $illness_categories = IllnessCategory::get();
        // next comment to get subs with have keys
        $category_illness_subs = IllnessCategory::whereHas('parent', function ($query) {
            $query->where('parent_id', null);
             })->with('illnessSub')->get();
         $illness_subs = IllnessSub::all();
        $genders = Gender::all();
        $ages = Age::all();
        $weights = Weight::all();
        $weight_genders = WeightGender::with('Weight')->get();
        $pregnancy_stages = PregnancyStage::all();
        $pregnancy_safties = PregnancySafety::all();
        $nursing_safties_categories = NursingSafetyCategory::all();
        $formulas = Formula::all();
        $effects = Effect::all();
        $scrs = Scr::all();
        $crcl_ranges = CrclRange::all();
        $interaction_severities = InteractionSeverity::all();
        
        return view('dashboard.basic-data.basic-data', compact('categories','parent_categories','category_subs','illness_categories','category_illness_subs','illness_subs','genders','ages','weights','weight_genders','pregnancy_stages','pregnancy_safties','nursing_safties_categories',
        'formulas','effects','scrs','crcl_ranges','interaction_severities'));
    }

}