<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\Sector;
use App\Industry;
use App\AskingPrice;
use App\SharesAvailable;
use App\ShareValue;
use App\WorkingSalary;
use App\Business;
use App\Notifications\SocialMediaBoostingNotification;
use App\Notifications\ContactUsMessage;
use Notification;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.login');
    }
    public function home(){
        return view('admin-dashboard.home');
    }
    public function sellerHome(){
        return view('seller-dashboard.home');
    }

    public function workingPartnerHome(){
        return view('working-partner-dashboard.home');
    }
    public function frontPage(){
        $businesses = Business::where('status',1)->where('featured_business',1)->latest()->paginate(6);
        return view('front-end.layouts.master',compact('businesses'));
    }
    public function updatedBusiness(Request $request){
        header('HTTP/1.0 200 OK');
        flush();
        $business = Business::find($request->custom_str1);
        $business->featured_business = 1;
        $business->save();
        return $this;
    }
    public function updateBusinessSocialMedia(Request $request){
        header('HTTP/1.0 200 OK');
        flush();
        $business = Business::find($request->custom_str1);
        $business->social_media_boosting = 1;
        $business->save();
        $business->user->notify(new SocialMediaBoostingNotification());
        return $this;
    }

    public function sellerProfile(){
        return view('seller-dashboard.profile-management');
    }
    public function sellerProfileUpdate(Request $request){
        auth()->user()->title = $request->title;
        auth()->user()->name = $request->name;
        auth()->user()->surname = $request->surname;
        auth()->user()->email = $request->email;
        auth()->user()->mobile = $request->mobile;
        auth()->user()->date_of_birth = $request->date_of_birth;
        auth()->user()->save();
        return back()->with('success','Profile Settings Update successfully');
    }
    public function workingPartnerProfile(){
        return view('working-partner-dashboard.profile-management');
    }
    public function workingPartnerProfileUpdate(Request $request){
        auth()->user()->title = $request->title;
        auth()->user()->name = $request->name;
        auth()->user()->surname = $request->surname;
        auth()->user()->email = $request->email;
        auth()->user()->mobile = $request->mobile;
        auth()->user()->date_of_birth = $request->date_of_birth;
        auth()->user()->working_partner_detail->nationality = $request->nationality;
        auth()->user()->working_partner_detail->language = $request->language;
        auth()->user()->working_partner_detail->city = $request->city;
        auth()->user()->working_partner_detail->previous_work = $request->previous_work;
        auth()->user()->working_partner_detail->current_work = $request->current_work;
        auth()->user()->working_partner_detail->business_experience = $request->business_experience;
        auth()->user()->working_partner_detail->qualifications = $request->qualifications;
        auth()->user()->working_partner_detail->interest = $request->interest;
        auth()->user()->working_partner_detail->hobbies = $request->hobbies;
        auth()->user()->working_partner_detail->strengths = $request->strengths;
        auth()->user()->working_partner_detail->weakness = $request->weakness;
        auth()->user()->working_partner_detail->source_of_finance = $request->source_of_finance;
        auth()->user()->working_partner_detail->funding_available = $request->funding_available;
        auth()->user()->working_partner_detail->what_if = $request->what_if;
        auth()->user()->working_partner_detail->update();
        auth()->user()->save();
        auth()->user()->working_partner_detail()->save(auth()->user()->working_partner_detail);
        return back()->with('success','Profile Settings Update successfully');
    }
    public function sendMessage(Request $request){
        Notification::route('mail', 'naveed1234@gmail.com')->notify(new ContactUsMessage($request->message,$request->email,$request->name));
        $notification = array(
    'message' => 'Thank you for contacting us. our customer support team will get back to you soon.',
    'alert-type' => 'success');
        return redirect('/')->with($notification);
    }
}
