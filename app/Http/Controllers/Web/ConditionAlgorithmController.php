<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Age;
use App\Models\WeightGender;
use App\Models\Scr;
use App\Models\CrclRange;
use App\Models\HxDrug;
use App\Models\HxDrugValue;


class ConditionAlgorithmController extends Controller
{   
    public function calculator(Request $request)
    {
        $age = Age::where('from', '<=' , $request->age)->where('to', '>=' , $request->age)->first();
        $weight_gender = WeightGender::where('gender_id',$request->gender_id)->where('weight_id',$request->weight_id)->first();
        $avg = ($weight_gender->range_from + $weight_gender->range_to)/2;
        $result = ((140 - $request->age)*$avg)/($request->scr * 72);
        if($request->gender_id == 2)
            $result *= 0.85;
        $scr = $this->scrResult($request->scr,$request->gender_id);
        $calc_result = $this->calculatorResult($result);
        return response()->json(['result' => round($result,2),'scr' => $scr, 'calc_result' => $calc_result, 'age' => $age, 'code' => '200']);
    }

    public function scrResult($scr, $gender) {
        return SCR::with('illnessSub')->where('gender_id',$gender)->where('range_from', '<=', $scr)->where('range_to', '>=', $scr)->first();
    }

    public function calculatorResult($result) {
        return CrclRange::with('illnessSub')->where('range_from', '<=', $result)->where('range_to', '>=', $result)->first();
    }

    public function recheckDrugs(Request $request) {
        $value1 = HxDrugValue::where('value',"value1")->whereIn('drug_id',$request->drug_drug_id)->get()->pluck('hx_drug_id')->unique()->toArray();
        $value2 = HxDrugValue::where('value',"value2")->whereIn('drug_id',$request->drug_drug_id)->get()->pluck('hx_drug_id')->unique()->toArray();
        $hx_ids = array_intersect($value1,$value2);
        $hx = HxDrug::with('interactionSeverity')->whereIn('id',$hx_ids)->get();
        return response()->json(['recheck_results' => $hx, 'code' => '200']);
    }
}