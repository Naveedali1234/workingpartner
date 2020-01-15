<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\Offer;
use App\Business;
class AjaxCallsController extends Controller
{
    public function fetchCities($id){
    	$province = Province::where('name',$id)->first();
    	$cities = $province->cities;
    	return response()->json($cities);
    }
    public function offerDetails($id){
    	$offer = Offer::with(['sender','reciever'])->find($id);
    	return $offer;
    }
    public function businessDetails(Business $business){
    	return $business;
    }
}
