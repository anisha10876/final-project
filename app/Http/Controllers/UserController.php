<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        return view('user.register');

    }

    public function login(){

        return view('user.login');
    }

    public function postregister(Request $request){
        $request->validate([
           'name'=>'required',
           'email'=>'required|unique:users',
           'password'=>'required_with:confirm|same:confirm',
        ]);

        $user=new User();

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->role_id = 1;
        $user->save();
        return redirect()->route('loginpage');
    }

    public function postlogin(Request $request){
        $request->validate([
            'email' =>'required',
            'password'=>'required',

        ]);
        $cred=$request->only('email','password');
//        dd($cred);
        if(Auth::attempt($cred)){
            $user=User::where('email',$request->email)->first();
            if($user->roles->title== 'Admin'){
                return redirect()->route('admindashboard');
            }
            else{
                return redirect()->route('home');
            }

    }else
    {
        return redirect()->back()->with('error','invalid cred.');
    }
}


    public function logout(){
        if(Auth::check()) {
            Auth::logout();
            return redirect()->route('home')->with('success','logout successfull');
        }
        return redirect()->route('loginpage');
    }




}
