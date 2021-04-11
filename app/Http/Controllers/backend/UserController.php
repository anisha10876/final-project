<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList(){
        $users = User::where('role_id', '2')->orderBy('created_at','desc')->get();
        return view('backend.userList', compact('users'));
    }
}
