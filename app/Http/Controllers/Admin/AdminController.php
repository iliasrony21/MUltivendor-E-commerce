<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(){

        return view('admin.login');
    }
    public function register(){

        return view('admin.register');
    }
    public function index(){

        return view('admin.dashboard');
    }
    public function profile(){

        $adminData = User::find(Auth::user()->id);
        return view('admin.profile',compact('adminData'));
    }
    public function changepassword(){

        return view('admin.changepassword');
    }
    public function updatepassword(Request  $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirmation_password' => 'required| same:new_password',
        ]);

        $oldpass = $request->old_password;
        $useroldpass = Auth::user()->password;
        if(Hash::check($oldpass,$useroldpass)){
            $findUser = User::find(Auth::user()->id);
            $findUser->password = bcrypt( $request->new_password);
            $findUser->update();
            return redirect()->route('admin.profile')->with('message','Password Updated successfully');

        }
        else{

          return back()->with('errorss','Old Password Not matched');

        }


    }
}
