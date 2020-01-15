<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;
use Storage;
use Session;
class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::where('user_id',auth()->id())->get();
        // dd($businesses);
        return view('seller-dashboard.business-management.all-businesses',compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller-dashboard.business-management.add-business');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $business = Business::create($request->all());
        $this->validate($request, [
            'pictures' => 'required',
                'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg'

        ]);
        $asking_price = explode(',',$request->asking_price);
        $shares_available = explode(',',$request->shares_available);
        $shares_percent = explode(',',$request->shares_percent);
        $working_salary = explode(',',$request->working_salary);
        if($request->hasFile('pictures')){
            foreach ($request->file('pictures') as $picture) {
            $pictures[] = $fileName = time().$picture->getClientOriginalName();
            // dd($fileName);
            Storage::put('public/'.$fileName,file_get_contents($picture));
            }
            Business::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'province' => $request->province,
                'city' => $request->city,
                'sector' => $request->sector,
                'industry' => $request->industry,
                'franchise' => $request->franchise,
                'asking_price_from' => $asking_price[0],
                'asking_price_to' => $asking_price[1],
                'shares_percent_from' => $shares_percent[0],
                'shares_percent_to' => $shares_percent[1],
                'shares_available_from' => $shares_available[0],
                'shares_available_to' => $shares_available[1],
                'working_salary_from' => $working_salary[0],
                'working_salary_to' => $working_salary[1],
                'business_description' => $request->business_description,
                'shares_available_description' => $request->shares_available_description,
                'working_condition_description' => $request->working_condition_description,
                'what_if' => $request->what_if,
                'other_details' => $request->other_details,
                'pictures' => implode(',', $pictures),
            ]);
            return redirect()->route('business.index')->with('success','Thank you for registering your business. We will Verify your business and will be listed soon.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        //
    }
    public function business_register(Request $request){
        // dd($request);

        $asking_price = explode(',',$request->asking_price);
        $shares_available = explode(',',$request->shares_available);
        $shares_percent = explode(',',$request->shares_percent);
        // $working_salary = explode(',',$request->working_salary);
        $this->validate($request, [
            'pictures' => 'required',
                'pictures.*' => 'image|mimes:jpeg,bmp,png,jpg,gif,svg'

        ]);
        
        if($request->hasFile('pictures')){
            foreach ($request->file('pictures') as $picture) {
            $pictures[] = $fileName = time().$picture->getClientOriginalName();
            // dd($fileName);
            Storage::put('public/'.$fileName,file_get_contents($picture));
            }
            Session::put('user_id',auth()->user()->id);
                session(['title'=>$request->title]);
                session(['province'=> $request->province]);
                session(['city'=>$request->city]);
                session(['sector'=>$request->sector]);
                session(['industry'=>$request->industry]);
                session(['franchise'=>$request->franchise]);
                session(['asking_price_from'=>$asking_price[0]]);
                session(['asking_price_to'=>$asking_price[1]]);
                session(['shares_percent_from'=>$shares_percent[0]]);
                session(['shares_percent_to'=>$shares_percent[1]]);
                session(['shares_available_from'=>$shares_available[0]]);
                session(['shares_available_to'=>$shares_available[1]]);
                session(['working_salary_from'=>$request->working_salary_from]);
                session(['working_salary_to'=>$request->working_salary_to]);
                session(['business_description'=> $request->business_description]);
                session(['shares_available_description'=>$request->shares_available_description]);
                session(['working_condition_description'=>$request->working_condition_description]);
                session(['what_if'=> $request->what_if]);
                session(['other_details'=>$request->other_details]);
                session(['pictures'=> implode(',', $pictures)]);
        }
        // dd(Session::get('asking_price_from'));
        return 1;


    }
    public function registerBusinessNotified(Request $request){
        header('HTTP/1.0 200 OK');
        flush();

        
        return $this;
        //save register business
    }
    public function registerBusinessCancelled(){
        Session::flash('danger','Sorry! Your payment was unsuccessful.');
        return view('seller-dashboard.add-business');
    }
    public function registerBusinessReturned(){
        if(session('user_id')==null){
            return redirect()->route('business.index');
        }
        else{
        Business::create([
                'user_id' => Session::get('user_id'),
                'title' => Session::get('title'),
                'province' => Session::get('province'),
                'city' => Session::get('city'),
                'sector' => Session::get('sector'),
                'industry' => Session::get('industry'),
                'franchise' => Session::get('franchise'),
                'asking_price_from' => Session::get('asking_price_from'),
                'asking_price_to' => Session::get('asking_price_to'),
                'shares_percent_from' => Session::get('shares_percent_from'),
                'shares_percent_to' => Session::get('shares_percent_to'),
                'shares_available_from' => Session::get('shares_available_from'),
                'shares_available_to' => Session::get('shares_available_to'),
                'working_salary_from' => Session::get('working_salary_from'),
                'working_salary_to' => Session::get('working_salary_to'),
                'business_description' => Session::get('business_description'),
                'shares_available_description' => Session::get('shares_available_description'),
                'working_condition_description' => Session::get('working_condition_description'),
                'what_if' => Session::get('what_if'),
                'other_details' => Session::get('other_details'),
                'pictures' => Session::get('pictures'),
            ]);
            
            return redirect()->route('business.index')->with('success','Congratulations ! Your payment has been made successfully and business is registered.');
        }
    }
}
