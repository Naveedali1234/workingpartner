<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
class AdminOfferController extends Controller
{
    public function sentOffers(){
    	$offers = Offer::where('status',0)->get();
    	return view('admin-dashboard.offers-management.sent-offers',compact('offers'));
    }
    public function acceptedOffers(){
    	$offers = Offer::where('status',1)->get();
    	return view('admin-dashboard.offers-management.recieved-offers',compact('offers'));
    }
}
