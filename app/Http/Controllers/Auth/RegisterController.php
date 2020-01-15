<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\WorkingPartnerDetail;
use App\Nationality;
use App\City;
use Session;
use Storage;
use DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function redirectPath() 
    {  
        if (auth()->user()->role == 'superadmin'){
            return route('admin.home');
        }
        elseif(auth()->user()->role == 'seller'){
            Session::flash('success','Thank you for registering with us as seller');
            return route('seller.home');
        }
        elseif(auth()->user()->role == 'working_partner'){
            Session::flash('success','Thank you for registering with us as seller');
            return route('workingPartner.home');
        }
    
    return '/';
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        if($request->id=='seller'){
            return view('auth.seller-register');
        }
        elseif ($request->id=='working_partner') {
            $languages = DB::table('languages')->get();
            $nationalities = Nationality::all();
            $cities = City::all();
            return view('auth.working_partner-register',compact('languages','nationalities','cities'));
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['check']=='seller'){
            return User::create([
                'title' => $data['title'],
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'mobile' => $data['mobile_number'],
                'date_of_birth' => $data['date_of_birth'],
                'role' => $data['check'],
            ]);
        }
        elseif($data['check']=='working_partner'){
                $user = User::create([
                'title' => $data['title'],
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'mobile' => $data['mobile_number'],
                'date_of_birth' => $data['date_of_birth'],
                'role' => 'working_partner',
            ]);
                $working_partner_details = WorkingPartnerDetail::create([
                    'user_id' => $user->id,
                    'nationality' => $data['nationality'],
                    'language' => $data['language'],
                    'city' => $data['city'],
                    'previous_work' => $data['previous_work'],
                    'current_work' => $data['current_work'],
                    'business_experience' => $data['business_experience'],
                    'qualifications' => $data['qualification'],
                    'interest' => $data['interest'],
                    'hobbies' => $data['hobbies'],
                    'strengths' => $data['strengths'],
                    'weakness' => $data['weakness'],
                    'source_of_finance' => $data['source_of_finance'],
                    'funding_available' => $data['funding_available'],
                ]);
                if(isset($data['file']))
                {
                    foreach ($data['file'] as $file) {
                        $files[] = $fileName = time().$file->getClientOriginalName();
                        Storage::put('public/documents/'.$fileName,file_get_contents($file));
                    }
                    $working_partner_details->documents = implode(',', $files);
                    $working_partner_details->save();
                }

            return $user;
        }
    }
}
