<?php

namespace App\Http\Controllers;

use App\SharesAvailable;
use Illuminate\Http\Request;

class SharesAvailableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $shares_availables = SharesAvailable::all();
        return view('admin-dashboard.shares-available-management.all-shares-available',compact('shares_availables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.shares-available-management.add-shares-available');
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
        $shares_available = SharesAvailable::create([
            'from' => $from,
            'to' => $to,

        ]);
        return redirect()->route('shares_available.index')->with('success','Shares Available Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SharesAvailable  $sharesAvailable
     * @return \Illuminate\Http\Response
     */
    public function show(SharesAvailable $sharesAvailable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SharesAvailable  $sharesAvailable
     * @return \Illuminate\Http\Response
     */
    public function edit(SharesAvailable $sharesAvailable)
    {
        return view('admin-dashboard.shares-available-management.edit-shares-available',compact('sharesAvailable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SharesAvailable  $sharesAvailable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SharesAvailable $sharesAvailable)
    {
        $from = $request->from;
        $to = $request->to;
        $sharesAvailable->from = $from;
        $sharesAvailable->to = $to;
        $sharesAvailable->save();
        return redirect()->route('shares_available.index')->with('success','Shares Available from '.$sharesAvailable->from.' to '.$sharesAvailable->to.' Updates successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SharesAvailable  $sharesAvailable
     * @return \Illuminate\Http\Response
     */
    public function destroy(SharesAvailable $sharesAvailable)
    {
        $sharesAvailable->delete();
        return redirect()->route('shares_available.index')->with('success','Shares Available from '.$sharesAvailable->from.' to '.$sharesAvailable->to.' Deleted successfully!');
    }
}
