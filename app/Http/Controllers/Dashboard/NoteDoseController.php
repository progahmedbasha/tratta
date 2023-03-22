<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\DoseMessage;
use App\Models\Drug;
use App\Models\DrugIndication;
use App\Models\Effect;
use App\Models\Gender;
use App\Models\IllnessSub;
use App\Models\NoteDose;
use App\Models\NoteDoseVariable;
use App\Models\PregnancyStage;
use App\Models\Variable;
use App\Models\Weight;
use Illuminate\Http\Request;

class NoteDoseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $html = view('dashboard.doses.variable-component.variables', compact('variables','var_name'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }
    public function store(Request $request)
    {
        //  return $request;
        $note_dose = new NoteDose;
        $note_dose->variable_id = $request->variable_id;
        $note_dose->effect_id = $request->effect_id;
        $note_dose->dose_type_id = $request->dose_type_id;
        $note_dose->priority = $request->priority;
        $note_dose->save();
        // save dos messages
        $dos_message = new DoseMessage;
        $dos_message->note_dose_id = $note_dose->id;
        $dos_message->recommended_dosage = $request->recommended_dosage;
        $dos_message->dosage_note = $request->dosage_note;
        $dos_message->titration_note = $request->titration_note;
        $dos_message->save();
        $countItems = count($request->variable);
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
                 $variable->variableDoses()->create([
                        'note_dose_id' => $note_dose->id,
                    ]);
                }
            }
            return redirect()->back()->with('success',' Added Successfully');
    }
    public function update(Request $request, $id)
    {
        $dose = NoteDose::find($id);
        $dose->priority = $request->priority;
        $dose->save();
        $fixed_dose = DoseMessage::where('note_dose_id', $id)->first();
        $fixed_dose->recommended_dosage = $request->recommended_dosage;
        $fixed_dose->dosage_note = $request->dosage_note;
        $fixed_dose->titration_note = $request->titration_note;
        $fixed_dose->save();
        return redirect()->back()->with('success','Updated Successfully');
    }

    public function add_row(Request $request)
    {
        // return $request;
        $number = $request->number;
         $effects = Effect::get();
        $html = view('dashboard.doses.variable-component.row', compact('effects','number'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }
    public function destroy($id)
    {
        $dose = NoteDose::findOrFail($id);
        $dose->doseMessage()->delete();
        $dose->noteDoseVariables()->delete();
        $dose->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
    public function varDelete($id)
    {
        $var_dose = NoteDoseVariable::findOrFail($id);
        $var_dose->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
}