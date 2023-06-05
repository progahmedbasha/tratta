<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TradeKey\StoreTradeKeyRequest;
use App\Models\TradeKey;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TradeKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trade_keys = TradeKey::all();
        return view('dashboard.basic-data.trade-keys', compact('trade_keys'));
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
    public function store(StoreTradeKeyRequest $request)
    {
        $trade= new TradeKey;
        $trade->name_key = $request->name_key;
        $trade->save();
        return redirect()->route('trade_keys.index')->with('success','TradeKey Added Successfully');

   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
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
    public function update(Request $request, $id)
    {
        $trade = TradeKey::findOrFail($id);
        $trade->name_key = $request->name_key;
        $trade->save();
        return redirect()->route('trade_keys.index')->with('success','TradeKey Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trade = TradeKey::findOrFail($id);
        $trade->delete();
        return redirect()->route('trade_keys.index')->with('success','Indication Deleted Successfully');
    }
}