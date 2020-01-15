<?php

namespace App\Http\Controllers;

use App\WorkingPartnerDetail;
use Illuminate\Http\Request;
use Session;
use App\Offer;
class WorkingPartnerDetailController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkingPartnerDetail  $workingPartnerDetail
     * @return \Illuminate\Http\Response
     */
    public function show(WorkingPartnerDetail $workingPartnerDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkingPartnerDetail  $workingPartnerDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkingPartnerDetail $workingPartnerDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkingPartnerDetail  $workingPartnerDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkingPartnerDetail $workingPartnerDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkingPartnerDetail  $workingPartnerDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkingPartnerDetail $workingPartnerDetail)
    {
        //
    }
    public function offersRecieved(Request $request){
        $offers = Offer::where('reciever_id',auth()->id())->get();
        return view('working-partner-dashboard.offers-recieved.offers-recieved',compact('offers'));
    }
    public function offerAccepted(Request $request){
        $offer = Offer::find($request->custom_str1);
        if(!empty($offer) && $offer->status==1){
        Session::flash('success','Congratulations ! Your payment has been made successfully.');
        }

        return redirect()->route('workingPartner.offersRecieved')->with('success','Congratulations ! Your payment has been made successfully.');
    }
    public function offerCancelled(){
        Session::flash('danger','Sorry! Your payment was unsuccessful.');
        return view('working-partner-dashboard.offers-recieved.success-danger');
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
