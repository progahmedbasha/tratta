<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Drug;
use App\Models\Effect;
use App\Models\ForbiddenCase;
use App\Models\ForbiddenCaseValue;
use App\Models\Gender;
use App\Models\IllnessSub;
use App\Models\Indication;
use App\Models\PregnancyStage;
use App\Models\Weight;
use Illuminate\Http\Request;

class ForbiddenCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forbidden_cases = ForbiddenCase::get();
        return view('dashboard.forbidden-case.forbidden-case', compact('forbidden_cases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
        public function fetch(Request $request)
    {
        $var_name = $request->variable;
        $variables = null;
        if($request->variable == "ages"){
           $variables = Age::get();
        }
        if($request->variable == "weights"){
            $variables = Weight::get();
        }
        if($request->variable == "genders"){
            $variables = Gender::get();
        }
        if($request->variable == "pregnancy_stages"){
            $variables = PregnancyStage::get();
        }
        if($request->variable == "illness"){
            $variables = IllnessSub::get();
        }
        if($request->variable == "drugs"){
            $variables = Drug::get();
        }
        if($request->variable == "indications"){
            $variables = Indication::get();
        }
        $html = view('dashboard.doses.variable-component.forbidden-variables', compact('variables','var_name'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }
    public function add_row(Request $request)
    {
        // return $request;
        $number = $request->number;
         $effects = Effect::get();
        $html = view('dashboard.doses.variable-component.forbidden-row', compact('effects','number'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }
    public function add_row_value2(Request $request)
    {
        // return $request;
        $number = $request->number;
        $effects = Effect::get();
        $html = view('dashboard.doses.variable-component.row_valu2', compact('effects','number'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $case= new ForbiddenCase;
        $case->note = $request->note;
        $case->save();
        //value 1
       $countItems = count($request->object_id);
            for ($i = 0; $i < $countItems; $i++) {
            $var = '';
                if($request->variable[$i] =="ages"){
                    $var = Age::whereIn('id', $request->object_id[$request->variable[$i]])->get();
                }else if($request->variable[$i] =="weights"){
                    $var = Weight::whereIn('id', $request->object_id[$request->variable[$i]])->get();
                }else if($request->variable[$i] =="genders"){
                    $var = Gender::whereIn('id', $request->object_id[$request->variable[$i]])->get();
                }else if($request->variable[$i] =="pregnancy_stages"){
                    $var = PregnancyStage::whereIn('id', $request->object_id[$request->variable[$i]])->get();
                }else if($request->variable[$i] =="illness"){
                    $var = IllnessSub::whereIn('id', $request->object_id[$request->variable[$i]])->get();
                }else if($request->variable[$i] =="drugs"){
                    $var = Drug::whereIn('id', $request->object_id[$request->variable[$i]])->get();
                }else if($request->variable[$i] =="indications"){
                    $var = Indication::whereIn('id', $request->object_id[$request->variable[$i]])->get();
                }
                foreach($var as $variable ){
                 $variable->variableForbidden()->create([
                        'forbidden_case_id' => $case->id,
                        'value' => '1',
                    ]);
                }
            }
            //value 2
            $countItems_v2 = count($request->object_id2);
            for ($e = 0; $e < $countItems_v2; $e++) {
            $var_v2 = '';
                if($request->variable2[$e] =="ages"){
                    $var_v2 = Age::whereIn('id', $request->object_id2[$request->variable2[$e]])->get();
                }else if($request->variable2[$e] =="weights"){
                    $var_v2 = Weight::whereIn('id', $request->object_id2[$request->variable2[$e]])->get();
                }else if($request->variable2[$e] =="genders"){
                    $var_v2 = Gender::whereIn('id', $request->object_id2[$request->variable2[$e]])->get();
                }else if($request->variable2[$e] =="pregnancy_stages"){
                    $var_v2 = PregnancyStage::whereIn('id', $request->object_id2[$request->variable2[$e]])->get();
                }else if($request->variable2[$e] =="illness"){
                    $var_v2 = IllnessSub::whereIn('id', $request->object_id2[$request->variable2[$e]])->get();
                }else if($request->variable2[$e] =="drugs"){
                    $var_v2 = Drug::whereIn('id', $request->object_id2[$request->variable2[$e]])->get();
                }else if($request->variable2[$e] =="indications"){
                    $var_v2 = Indication::whereIn('id', $request->object_id2[$request->variable2[$e]])->get();
                }
                foreach($var_v2 as $variable_v2 ){
                 $variable_v2->variableForbidden()->create([
                        'forbidden_case_id' => $case->id,
                        'value' => '2',
                    ]);
                }
        }
        return redirect()->back()->with('success','Forbidden Added Successfully');
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
        $case= ForbiddenCase::findOrFail($id);
        $case->note = $request->note;
        $case->save();
        return redirect()->back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $case = ForbiddenCase::find($id);
        $case->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
}