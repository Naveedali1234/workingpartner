<?php

namespace App\Http\Controllers;

use App\AskingPrice;
use Illuminate\Http\Request;

class AskingPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asking_prices = AskingPrice::all();
        return view('admin-dashboard.asking-price-management.all-asking-price',compact('asking_prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.asking-price-management.add-asking-price');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $asking_price = AskingPrice::create([
            'from' => $from,
            'to' => $to,

        ]);
        return redirect()->route('asking_price.index')->with('success','Asking Price Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AskingPrice  $askingPrice
     * @return \Illuminate\Http\Response
     */
    public function show(AskingPrice $askingPrice)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AskingPrice  $askingPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(AskingPrice $askingPrice)
    {
        return view('admin-dashboard.asking-price-management.edit-asking-price',compact('askingPrice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AskingPrice  $askingPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AskingPrice $askingPrice)
    {
        $from = $request->from;
        $to = $request->to;
        $askingPrice->from = $from;
        $askingPrice->to = $to;
        $askingPrice->save();
        return redirect()->route('asking_price.index')->with('success','Asking Price from '.$askingPrice->from.' to '.$askingPrice->to.' Updates successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AskingPrice  $askingPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $askingPrice = AskingPrice::find($id);
        $askingPrice->delete();
        return redirect()->route('asking_price.index')->with('success','Asking Price from '.$askingPrice->from.' to '.$askingPrice->to.' Deleted successfully!');
    }
}
