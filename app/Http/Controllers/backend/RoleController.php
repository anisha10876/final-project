<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
   public function roles(){
       return view('backend.partial.roles');
   }


   public function addroles(){
    return view('backend.partial.addroles');
   }


   public function addrolessubmit(Request $request){
       $role = new Role();
       $role->title = $request->role;
       $role->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->role)));
       $role->save();
       return redirect()->back();

   }
}
