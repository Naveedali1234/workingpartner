<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function allSellers(){
    	$sellers = User::where('role','seller')->get();
    	return view('admin-dashboard.users-management.all-sellers',compact('sellers'));
    }
    public function allWorkingPartners(){
    	$working_partners = User::where('role','working_partner')->get();
    	return view('admin-dashboard.users-management.all-working-partners',compact('working_partners'));
    }
    public function activateAccount(User $user){
    	$user->status = 1;
    	$user->save();
    	return back()->with('success','User Account has been activated successfully');
    }
    public function deactivateAccount(User $user){
    	$user->status = 0;
    	$user->save();
    	return back()->with('success','User Account has been deactivated successfully');
    }
    public function adminProfileSettings(){
        return view('admin-dashboard.profile-settings.profile-page');
    }
    public function updateAdminProfile(Request $request, User $user){
        $messages = [
            'different:old_password' => 'You entered old password. Please use new password',
        ];
        $this->validate($request,[
            'email' => 'required|email|string|max:255',
            'mobile' => 'required',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'password' => 'confirmed', 
        ],[
            'password.different' => 'You entered old password. Please use new password to change it',
        ]);
        if(!empty($request->password)){
            if (Hash::check($request->old_password, $user->password)) {
                    $user->password = Hash::make($request->password);
                    $user->save();
                }
                else{
                    return back()->with('danger','Old Password doesn\'t match, Please use valid');
                }
        }
            $user->email = $request->email;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->mobile = $request->mobile;
            $user->date_of_birth = $request->date_of_birth;
            $user->save();
            return back()->with('success', $user->name.' Profile settings updated successfully.');
    }
    public function allAdmins(){
        $admins = User::where('role','admin')->get();
        return view('admin-dashboard.admins-management.all-admins',compact('admins'));
    }
    public function createAdmin(){
        return view('admin-dashboard.admins-management.create-admin-form');
    }
    public function editAdmin(User $user){
        return view('admin-dashboard.admins-management.edit-admin-form',compact('user'));
    }
    public function updateAdmin(Request $request, User $user){
        $this->validate($request);
        return view('admin-dashboard.admins-management.edit-admin-form');
    }
    public function storeAdmin(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $user = User::create([
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'date_of_birth' => $request->date_of_birth,
                    'mobile' => $request->mobile,
                    'role' => 'admin'
                ]);
        return redirect()->route('admins.index')->with('success',$user->name. 'Added successfully');
    }
    public function destroyAdminAccount(User $user){
        $user->delete();
        return back()->with('success',$user->name.' account has been delete successfully');
    }



}
