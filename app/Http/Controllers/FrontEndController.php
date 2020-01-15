<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
class FrontEndController extends Controller
{
    public function searchBusiness(Request $request){
    	$province = $request->input('province');
    	$city = $request->input('city');
    	$sector = $request->input('sector');
    	$industry = $request->input('industry');
    	$franchise = $request->input('franchise');
    	$asking_price_from = $request->input('asking_price_from');
    	$asking_price_to = $request->input('asking_price_to');
    	$shares_available_from = $request->input('shares_available_from');
    	$shares_available_to = $request->input('shares_available_to');
    	$shares_percent_from = $request->input('shares_percent_from');
    	$shares_percent_to = $request->input('shares_percent_to');
    	$working_salary_from = $request->input('working_salary_from');
    	$working_salary_to = $request->input('working_salary_to');
    	
    	$businesses = '';
    	if(!empty($province)){
    		$businesses = Business::where('province',$province);
    	}
    	if(!empty($city)){
    		$businesses = Business::where('city',$city);
    	}
    	if(!empty($sector)){
    		$businesses = Business::where('sector',$sector);
    	}
    	if(!empty($industry)){
    		$businesses = Business::where('industry',$industry);
    	}
    	if(!empty($franchise)){
    		$businesses = Business::where('franchise',$franchise);
    	}
    	if(!empty($asking_price_from)){
    		$businesses = Business::where('asking_price_from',$asking_price_from);
    	}
    	if(!empty($asking_price_to)){
    		$businesses = Business::where('asking_price_to',$asking_price_to);
    	}
    	if(!empty($industry)){
    		$businesses = Business::where('industry',$industry);
    	}
    	if(!empty($shares_percent_from)){
    		$businesses = Business::where('shares_percent_from',$shares_percent_from);
    	}
    	if(!empty($shares_percent_to)){
    		$businesses = Business::where('shares_percent_to',$shares_percent_to);
    	}
    	if(!empty($shares_available_from)){
    		$businesses = Business::where('shares_available_from',$shares_available_from);
    	}
    	if(!empty($shares_available_to)){
    		$businesses = Business::where('shares_available_to',$shares_available_to);
    	}
    	if(!empty($working_salary_from)){
    		$businesses = Business::where('working_salary_from',$working_salary_from);
    	}
    	if(!empty($working_salary_to)){
    		$businesses = Business::where('working_salary_to',$working_salary_to);
    	}
        if(str_replace(url('/'), '', url()->previous())=="/featured-businesses")
        {
            // dd('hello');
            $businesses = $businesses->where('status',1)->where('featured_business',1)->latest()->get();
        }
        else
        {
    	   $businesses = $businesses->where('status',1)->orderBy('featured_business','DESC')->latest()->get();
        }
    	return view('front-end.business-search-management.business-search-results',compact('businesses'));

    }

    public function SingleBusinessDetails($title){
    	$business = Business::where('title',$title)->first();
    	return view('front-end.business-search-management.single-business-details',compact('business'));

    }
    public function featuredBusinesses(){
        $businesses = Business::where('status',1)->where('featured_business',1)->latest()->paginate(9);
        return view('front-end.business-search-management.featured-businesses',compact('businesses'));
    }
    
}
