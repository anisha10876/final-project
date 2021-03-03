<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Testomonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestomonialController extends Controller
{
    public function testomonials(){
        $testomonials = Testomonial::all();
        return view('backend.partial.testomonials',compact('testomonials'));
    }


    public function addtestomonials(){
        return view('backend.partial.addtestomonials');
    }

    public function addtestomonialssubmit(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if($request->hasFile('image')){
            $requestedimage = $request->image;
            $imagename = time().$requestedimage->GetClientOriginalName();
            $path = public_path('images');
            $requestedimage->move($path,$imagename);
        }
       Testomonial::create([
           'name' => $request->name,
           'image' =>'images/'.$imagename,
           'description' => $request->description
       ]);
       return redirect()->route('testomonials')->with('success','User added to  team');
    }

    public function edittestomonial($id){
        $testomonial = Testomonial::findorfail($id);
        return view('backend.partial.edittestomonials',compact('testomonial'));
    }


    public function edittestomonialssubmit(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

       $testomonial = Testomonial::findorfail($id);
       $testomonial->name = $request->name;
       if($request->hasFile('image')){
        $image_path = public_path($testomonial->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $requestedimage = $request->image;
        $imagename = time().$requestedimage->GetClientOriginalName();
        $path = public_path('images');
        $requestedimage->move($path,$imagename);
        $testomonial->image = 'images/'.$imagename;
        }
       $testomonial->description = $request->description;
       $testomonial->update();
       return redirect()->route('testomonials')->with('success','Testomonial edited successfully');
    }

    public function deletetestomonial($id){
        $testomonial = Testomonial::findorfail($id);
        $image_path = public_path($testomonial->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $testomonial->delete();
        return redirect()->back()->with('error','Testomonial deleted successfully');
    }


}
