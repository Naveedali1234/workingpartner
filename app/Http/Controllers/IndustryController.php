<?php

namespace App\Http\Controllers;

use App\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = Industry::all();
        return view('admin-dashboard.industries-management.all-industries',compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.industries-management.add-industry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $industry = Industry::create([
            'name' => $name,
        ]);
        return redirect()->route('industries.index')->with('success','Industry Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function show(Industry $industry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function edit(Industry $industry)
    {
        return view('admin-dashboard.industries-management.edit-industry',compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Industry $industry)
    {
        $name = $request->name;
        $industry->name = $name;
        $industry->save();
        return redirect()->route('industries.index')->with('success','Industry'.$industry->name.' Updates successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industry $industry)
    {
        $industry->delete();
        return redirect()->route('industries.index')->with('success','industry'.$industry->name.' Deleted successfully!');
    }
}
