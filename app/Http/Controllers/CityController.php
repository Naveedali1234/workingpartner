<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Province;
use App\Imports\CitiesImport;
use Excel;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        return view('admin-dashboard.cities-management.add-city',compact('provinces'));
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
        $province_id = $request->province;
        $city = City::create([
            'name' => $name,
            'province_id' => $province_id,
        ]);
        return redirect()->route('provinces.index')->with('success','City Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $provinces = Province::all();
        return view('admin-dashboard.cities-management.edit-city',compact('city','provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $name = $request->name;
        $province_id = $request->province;
        $province = Province::find($province_id);
        $city->name = $name;
        $city->province_id = $province_id;
        $city->save();
        return view('admin-dashboard.cities-management.all-cities',compact('province'))->with('success','City'.$city->name.' Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $province = $city->province;
        $city_ = $city->name;
        $city->delete();
        return view('admin-dashboard.cities-management.all-cities',compact('province'))->with('success','City'.$city_.' deleted successfully!');
    }

    public function allCities(Province $province){
        
        return view('admin-dashboard.cities-management.all-cities',compact('province'));
    }

    public function BulkUploadForm(){
        $provinces = Province::all();
        return view('admin-dashboard.cities-management.bulk-upload-form',compact('provinces'));
    }
    public function BulkUploadStore(Request $request){
        // $provinces = Province::all();
        Excel::import(new CitiesImport($request->province),$request->file('file'));
        return redirect()->route('cities.bulkupload');
    }
}
