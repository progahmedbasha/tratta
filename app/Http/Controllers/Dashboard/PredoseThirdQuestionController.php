<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Drug;
use App\Models\Gender;
use App\Models\IllnessSub;
use App\Models\Predose;
use App\Models\PredoseThirdQuestion;
use App\Models\PregnancyStage;
use App\Models\Weight;
use Illuminate\Http\Request;

class PredoseThirdQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $questions = PredoseThirdQuestion::where('predose_id', $id)->get();
        $predose_drug_id = Predose::find($id);
        return view('dashboard.predose-questions.third-question', compact('id','questions','predose_drug_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
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
                }
                foreach($var as $variable ){
                 $variable->variablePredoseThirdQuestion()->create([
                        'predose_id' => $request->predose_id,
                        'text' => $request->text
                    ]);
                }
            }
        return redirect()->back()->with('success','First Question Added Successfully');
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
        $predose= PredoseThirdQuestion::findOrFail($id);
        $predose->text = $request->text;
        $predose->save();
        return redirect()->back()->with('success','First Question Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $predose = PredoseThirdQuestion::findOrFail($id);
        $predose->delete();
        return redirect()->back()->with('success','Pre-dose Q Deleted Successfully');
    }
}