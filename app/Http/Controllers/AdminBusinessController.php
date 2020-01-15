<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Notifications\suggestChangesNotification;
class AdminBusinessController extends Controller
{
    public function verifiedBusinesses(){
    	$businesses = Business::where('status',1)->get();
    	return view('admin-dashboard.business-management.verified-businesses',compact('businesses'));
    }
    public function unverifiedBusinesses(){
    	$businesses = Business::where('status',0)->get();
    	return view('admin-dashboard.business-management.unverified-businesses',compact('businesses'));
    }
    public function verifyBusiness(Business $business){
    	$business->status = 1;
    	$business->save();
    	return redirect()->route('verified.businesses')->with('success',$business->title.' business verified successfully');
    }
    public function destroyBusiness(Business $business){
    	$title = $business->title;
    	$business->delete();
    	return redirect()->route('unverified.businesses')->with('success',$title.' business deleted successfully');
    }
    public function suggestChanges(Request $request){
        $business = Business::findOrFail($request->business_id);
        if($business){
            $business->user->notify(new suggestChangesNotification($request->message,$business));
            return back()->with('success','Changes has beend sent to '.$business->user->name);
        }
        else{
            return back()->with('danger','There is an error, please try again');
        }
    }

}
