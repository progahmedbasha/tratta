<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\Drug;
use App\Models\DrugIndication;
use App\Models\Effect;
use App\Models\Gender;
use App\Models\IllnessSub;
use App\Models\NoteDose;
use App\Models\NoteMessage;
use App\Models\PregnancyStage;
use App\Models\Variable;
use App\Models\Weight;
use Illuminate\Http\Request;

class NotesAndController extends Controller
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
        $variable_code = Variable::findOrFail($id);
        $drug_code = Drug::where('id', $variable_code->variableable_id)->first();
        $indication_code = DrugIndication::where('id', $variable_code->variableable_id)->first();
        // $effects = Effect::all();
        // $effect_existe = NoteDose::where('variable_id', $id)->get()->pluck('effect_id');
        $effects = Effect::get();
        $fixed_doses = NoteDose::where('variable_id', $id)->where('dose_type_id',5)->with('noteDoseVariables')->get();
        return view('dashboard.notes.notes-and', compact('id','variable_code','drug_code','indication_code','effects','fixed_doses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $note_dose = new NoteDose;
        $note_dose->variable_id = $request->variable_id;
        $note_dose->effect_id = $request->effect_id;
        $note_dose->dose_type_id = $request->dose_type_id;
        $note_dose->save();
        // save dos messages
        $dos_message = new NoteMessage;
        $dos_message->note_dose_id = $note_dose->id;
        $dos_message->note = $request->note;
        $dos_message->save();
        $countItems = count($request->object_id);
            for ($i = 0; $i < $countItems; $i++) {
                // save age
                if($request->variable[$i] =="ages"){
                    $var = Age::where('id', $request->object_id[$i])->first();
                    $variable = $var->variableDoses()->create([
                        'note_dose_id' => $note_dose->id,
                    ]);
                }
                // save weight
                if($request->variable[$i] =="weights"){
                    $var = Weight::where('id', $request->object_id[$i])->first();
                    $variable = $var->variableDoses()->create([
                        'note_dose_id' => $note_dose->id,
                    ]);
                }
                // save gender
                if($request->variable[$i] =="genders"){
                    $var = Gender::where('id', $request->object_id[$i])->first();
                    $variable = $var->variableDoses()->create([
                        'note_dose_id' => $note_dose->id,
                    ]);
                }
                // save pregnancy stage
                if($request->variable[$i] =="pregnancy_stages"){
                    $var = PregnancyStage::where('id', $request->object_id[$i])->first();
                    $variable = $var->variableDoses()->create([
                        'note_dose_id' => $note_dose->id,
                    ]);
                }
                // save illnes subs
                if($request->variable[$i] =="illness"){
                    $var = IllnessSub::where('id', $request->object_id[$i])->first();
                    $variable = $var->variableDoses()->create([
                        'note_dose_id' => $note_dose->id,
                    ]);
                }
                // save drug
                if($request->variable[$i] =="drugs"){
                    $var = Drug::where('id', $request->object_id[$i])->first();
                    $variable = $var->variableDoses()->create([
                        'note_dose_id' => $note_dose->id,
                    ]);
                }
            }
            return redirect()->back()->with('success',' Added Successfully');
    }

public function update(Request $request, $id)
    {
        $fixed_dose = NoteMessage::where('note_dose_id', $id)->first();
        $fixed_dose->note = $request->note;
        $fixed_dose->save();
        return redirect()->back()->with('success','Fixed Dose Updated Successfully');
    }
    public function destroy($id)
    {
        $dose = NoteDose::findOrFail($id);
        $dose->noteMessage()->delete();
        $dose->delete();
        return redirect()->back()->with('success','Fixed Dose Deleted Successfully');
    }
}