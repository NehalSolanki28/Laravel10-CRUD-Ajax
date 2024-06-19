<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function index(){
        return view('User.userRegister');
    }

    public function store(Request $request){
        try{
            $user = User::create([
                'userName' => $request->userName,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=>$request->role,
            ]);
            session()->flash('success','User Created SuccessFully');
            return redirect()->back();
        }
        catch(Exception $e){
            toastr()->error('Submitted, you will be contact shortly..');
            return redirect()->back();
        }
    }

    public function userLogin(Request $request){

        $userData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            toastr()->success('LogIn SuccessFully...','Success');
            return redirect()->route('clubs.index');
        }
        else{
            return redirect()->back()-> with('error','Invalid Login Credentials..');
        }
    }
    public function userAuthCheck(){
        if(Auth::check()){
            return redirect()->route('clubs.index');
        }
        else{
            return redirect()->route('userRegister');
        }
    }

    public function userLogOut(){
        Auth::logout();
        toastr()->success('LogOut SuccessFully...','Logout');
        return redirect()->route('home')->with('logout','Logout SuccessFully..');
    }

}
