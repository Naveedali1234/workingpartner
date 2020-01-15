<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;
use App\User;
use App\Business;
use Session;
class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offer_type = 'Sent Offers';
        $offers = Offer::where('sender_id',auth()->id())->get();
        return view('seller-dashboard.offers-management.all-offers',compact('offers','offer_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $businesses = Business::select('title')->where('user_id',auth()->id())->get();
        $users = User::select('email')->where('role','working_partner')->get();
        return view('seller-dashboard.offers-management.create-offer',compact('businesses','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('email')){
            $user = User::where('email',$request->email)->where('email','!=',auth()->user()->email)->first();
            if(!empty($user)){
                Offer::create([
                    'sender_id' => $request->sender_id,
                    'reciever_id' => $user->id,
                    'description' => $request->description,
                    'amount' => $request->amount,
                    'percent_share' => $request->percent_share,
                    'business_title' => $request->business_title,
                ]);
                return back()->with('success','Offer Sent Sucessfully and you can see the status in Sent Offer list');
            }
            else{
                return back()->with('danger','Please provide a valid email address');
            }
        }
        else{
            return back()->with('danger','Please provide a valid email address');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return back()->with('success','Offer Deleted Sucessfully');
    }
    public function offersRecieved(Request $request){
        $offer_type = 'Recieved Offers';
        $offers = Offer::where('reciever_id',auth()->id())->get();
        return view('seller-dashboard.offers-management.all-offers',compact('offers','offer_type'));
    }
    public function offerAccepted(){
        Session::flash('success','Congratulations !, Your payment has been made successfully.');
        return redirect()->route('business.index')->with('success','Congratulations ! Your payment has been made successfully and your business is Featured.');
    }
    public function offerCancelled(){
        Session::flash('danger','Sorry!, Your payment was unsuccessful.');
        return view('seller-dashboard.layouts.master');
    }
    public function offerNotified(Request $request){
        header('HTTP/1.0 200 OK');
        flush();
        $offer = Offer::find($request->custom_str1);
        $offer->status = 1;
        $offer->save();
        return $this;
    }
}
