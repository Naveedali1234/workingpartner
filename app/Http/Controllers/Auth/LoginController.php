<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        
        return view('auth.user-login');
    }
    protected function authenticated(Request $request, $user)
    {
        if($user->status!=1){
            $this->logout($request);
            $notification = array(
    'message' => 'Sorry, Your account has been deactivated',
    'alert-type' => 'error'
);
            return redirect('/')->with($notification);
        }
    }
    public function redirectPath() 
    {  
        if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin'){
            return route('admin.home');
        }
        elseif(auth()->user()->role == 'seller'){
            return route('seller.home');
        }
        elseif(auth()->user()->role == 'working_partner'){
            return route('workingPartner.home');
        }
    
    return '/';
    }
}
