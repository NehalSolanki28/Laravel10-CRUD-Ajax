<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
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
                'name' => $request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=>$request->role,
            ]);

            if($user){     
                $userEmail = $request->email;
                $userName = $request->userName;
                SendEmailJob::dispatch($userEmail,$userName);
            }

            session()->flash('success','User Created SuccessFully');
            return redirect()->back();
        }
        catch(Exception $e){
            toastr()->error('Duplicate Request' , 'User Already Exists......');
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
            return redirect()->route('clubs.index')->with('success','Log In SuccessFully....');
        }
        else{
            return redirect()->back()-> with('error','Invalid Logpin Credentials..');
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
        return redirect()->route('home')->with('success','Logout SuccessFully..');
    }

}
