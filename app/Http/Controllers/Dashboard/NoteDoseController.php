<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Models\DoseMessage;
use App\Models\Drug;
use App\Models\DrugIndication;
use App\Models\Effect;
use App\Models\NoteDose;
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
        if($request->variable == "Ages"){
           $variables = Age::get();
        }
        if($request->variable == "Weights"){
            $variables = Weight::get();
        }
        $html = view('dashboard.doses.variable-component.variables', compact('variables','var_name'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }
    public function store(Request $request)
    {
        return $request;
    }

    public function add_row()
    {
         $effects = Effect::get();
        $html = view('dashboard.doses.variable-component.row', compact('effects'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }

}