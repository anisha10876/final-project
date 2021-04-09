<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\User;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
                return redirect()->route('home')->with('success','User Login Successful.');
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

    public function forgotPassword(Request $request){
        return view('user.forgotPassword');
    }

    public function postForgotPassword(Request $request){
        $request->validate([
            'email' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user){
            Toastr::error("User with given email not found", "Invalid User");
            return redirect()->back();
        }
        $token = Str::random(20);
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $mail = Mail::to($user->email)->send(new ResetPasswordMail($user, $token));
        Toastr::success('Check your email to reset password','Email Sent.');
        return redirect('/');
    }

    public function resetPassword($email, $token){
        $validReset = DB::table('password_resets')->where('email', $email)
            ->where('token', $token)
            ->orderBy('created_at','desc')
            ->first();
        $user = User::where('email', $email)->first();
        if($validReset && $user){
            return view('user.resetPassword', compact('user'));
        }else{
            Toastr::error("Invalid user or reset token", "Unauthorized Reset");
            return redirect('/');
        }
    }

    public function postResetPassword(Request $request){
        $request->validate([
            'user_id' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);
        $user = User::findOrFail($request->user_id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        $validReset = DB::table('password_resets')->where('email', $user->email)->delete();
        Toastr::success('Login with your new password', 'Password Change Successful');
        return redirect()->route('login');
    }


}
