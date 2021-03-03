<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function teams(){
        $teams = Team::all();
        return view('backend.partial.teams',compact('teams'));
    }

    public function addteam(){
        return view('backend.partial.addteam');
    }

    public function addteamsubmit(Request $request){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if($request->hasFile('image')){
            $requestedimage = $request->image;
            $imagename = time().$requestedimage->GetClientOriginalName();
            $path = public_path('images');
            $requestedimage->move($path,$imagename);
        }
       Team::create([
           'designation' => $request->designation,
           'name' => $request->name,
           'image' =>'images/'.$imagename,
           'description' => $request->description
       ]);
       return redirect()->route('teams')->with('success','User added to  team');
    }


    public function editteam($id){
        $team = Team::findorfail($id);
        return view('backend.partial.editteam',compact('team'));
    }

    public function editteamsubmit(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

       $team = Team::findorfail($id);
       $team->name = $request->name;
       $team->designation = $request->designation;
       if($request->hasFile('image')){
        $image_path = public_path($team->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $requestedimage = $request->image;
        $imagename = time().$requestedimage->GetClientOriginalName();
        $path = public_path('images');
        $requestedimage->move($path,$imagename);
        $team->image = 'images/'.$imagename;
        }
       $team->description = $request->description;
       $team->update();
       return redirect()->route('teams')->with('success','User edited successfully');
    }

    public function deleteteam($id){
        $team = Team::findorfail($id);
        $image_path = public_path($team->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $team->delete();
        return redirect()->back()->with('error','User deleted successfully');
    }


}
