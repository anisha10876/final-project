<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Blog;
use App\Setting;

class BlogController extends Controller
{
    public function blogs(){
        $blogs = Blog::all();
        return view('backend.blogs',compact('blogs'));
    }

    public function addblog(){
        return view('backend.addblog');
    }

    public function addblogsubmit(Request $request){
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if($request->hasFile('image')){
            $requestedimage = $request->image;
            $imagename = time().$requestedimage->GetClientOriginalName();
            $path = public_path('images');
            $requestedimage->move($path,$imagename);
        }
       Blog::create([
           'author' => $request->author,
           'name' => $request->name,
           'image' =>'images/'.$imagename,
           'description' => $request->description
       ]);
       return redirect()->route('blogs')->with('success','Blogs added');
    }


    public function editblog($id){
        $blog = Blog::findorfail($id);
        return view('backend.editblog',compact('blog'));
    }


    public function editblogsubmit(Request $request,$id){

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

       $blog = Blog::findorfail($id);
       $blog->name = $request->name;
       $blog->author = $request->author;
       if($request->hasFile('image')){
        $image_path = public_path($blog->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $requestedimage = $request->image;
        $imagename = time().$requestedimage->GetClientOriginalName();
        $path = public_path('images');
        $requestedimage->move($path,$imagename);
        $blog->image = 'images/'.$imagename;
        }
       $blog->description = $request->description;
       $blog->update();
       return redirect()->route('blogs')->with('success','Blogs edited successfully');
    }


    public function deleteblog($id){
        $blog = Blog::findorfail($id);
        $image_path = public_path($blog->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $blog->delete();
        return redirect()->back()->with('error','Blog deleted successfully');
    }

    public function editAboutPage(){
        $settings = Setting::all()->pluck('value','key')->toArray();
        return view('backend.editAbout', compact('settings'));
    }

    public function updateAboutPage(Request $request){
        $data = $request->all();
        foreach($data as $key=>$value){
            Setting::updateOrCreate(['key'=>$key],['value' => $value]);
        }
        return redirect()->back()->with('success','About Page Data Updated.');
    }
}
