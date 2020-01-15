<?php

namespace App\Http\Controllers;

use App\ShareValue;
use Illuminate\Http\Request;

class ShareValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $share_values = ShareValue::all();
        return view('admin-dashboard.shares-value-management.all-shares-value',compact('share_values'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.shares-value-management.add-shares-value');
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
        $share_value = ShareValue::create([
            'from' => $from,
            'to' => $to,

        ]);
        return redirect()->route('share_value.index')->with('success','Share Value Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShareValue  $shareValue
     * @return \Illuminate\Http\Response
     */
    public function show(ShareValue $shareValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShareValue  $shareValue
     * @return \Illuminate\Http\Response
     */
    public function edit(ShareValue $shareValue)
    {
        return view('admin-dashboard.shares-value-management.edit-shares-value',compact('shareValue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShareValue  $shareValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShareValue $shareValue)
    {
        $from = $request->from;
        $to = $request->to;
        $shareValue->from = $from;
        $shareValue->to = $to;
        $shareValue->save();
        return redirect()->route('share_value.index')->with('success','Share Value from '.$shareValue->from.' to '.$shareValue->to.' Updates successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShareValue  $shareValue
     * @return \Illuminate\Http\ResponsValue    
    */
     public function destroy(ShareValue $shareValue)
    {
        $shareValue->delete();
        return redirect()->route('share_value.index')->with('success','Share Value from '.$shareValue->from.' to '.$shareValue->to.' Deleted successfully!');
    }
}
