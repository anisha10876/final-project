<?php

namespace App\Http\Controllers\backend;

use App\Brand;
use App\Car;
use App\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('backend.dashboard');
    }

    public function addfaq(){
        return view('backend.partial.addfaq');
    }

    // faq submit#########
    public function addfaqsubmit(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        Faq::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success','Faq added succefully');
    }


    // all faqs######
    public function faqs(){
        $faqs = Faq::all();
        return view('backend.partial.faqs',compact('faqs'));
    }

    public function editfaq($id){
        $faq = Faq::findorfail($id);
        return view('backend.partial.editfaq',compact('faq'));
    }


    public function editfaqsubmit(Request $request,$id){
        $faq = Faq::findorfail($id);
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->update();
        return redirect()->route('faqs')->with('success','edited successfully!!');
    }

    public function deletefaq($id){
        $faq = Faq::findorfail($id);
        $faq->delete();
        return redirect()->back()->with('error','deleted successfully!!!');
    }



    public function carpage(){
        $cars = Car::all();
        $brands = Brand::all();
        // $cars->load('brands');
        // dd($cars);
        return view('backend.partial.carsadmin',compact('cars','brands'));
    }

    public function addcar(){
        $brands = Brand::all();
        return view('backend.partial.addcar',compact('brands'));
    }

    public function addcarsubmit(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:40|min:5',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'broucher'=>'required',
            'status' => 'required',
            'price' => 'required',
            'condition' => 'required',
            'brand' => 'required',
            'year' => 'required',
            'model' => 'required',
            'color' => 'required',
            'cc' => 'required',
            'km' => 'required',
            'description'=>'required',

        ]);
        if($request->hasFile('image')){
           $requestedimage = $request->file('image');
           $imagename = time().$requestedimage->GetClientOriginalName();
           $path = public_path('images');
           $requestedimage->move($path,$imagename);
        }
        if($request->hasFile('broucher')){
            $requestedbroucher = $request->file('broucher');
            $brouchername = time().$requestedbroucher->GetClientOriginalName();
            $path = public_path('broucher');
            $requestedbroucher->move($path,$brouchername);
         }


            $car = Car::create([
            'name' => $request->name,
            'image' => 'images/'.$imagename,
            'broucher'=>'broucher/'.$brouchername,
            'description'=>$request->description,
            'brand_id' => $request->brand,
            'price' => $request->price,
            'neg_status' => $request->status,
            'condition' => $request->condition,
            'year' => $request->year,
            'model' => $request->model,
            'km' => $request->km,
            'color'=> $request->color,
            'cc' => $request->cc

        ]);

        if($request->spec){
            $speckeys = array_keys($request->spec);
            foreach($speckeys as $key){

                $car->specifications()->create([
                    'title' => $request->spec[$key]['title'],
                    'specifications' => serialize(explode(",",$request->spec[$key]['specification']))
                ]);
            }
        }
        return redirect()->route('cars')->with('success','product added successfully');
        // dd($request->all());

    }

    public function editcar($id){
        $car = Car::findorfail($id);
        $brands = Brand::all();
        return view('backend.partial.editcars',compact('car','brands'));
    }

    public function editcarsubmit(Request $request,$id){
        $request->validate([
            'name' => 'required|max:15|min:5',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        $messages = array(
            'name.required' => 'enter the name.',
        );


        $car = Car::findorfail($id);
        $car->name = $request->name;
        if($request->hasFile('image')){
            $requestedimage = $request->file('image');
            $imagename = time().$requestedimage->GetClientOriginalName();
            $path = public_path('images');
            $requestedimage->move($path,$imagename);
            $car->image = "images/".$imagename;
        }
        $car->brand_id = $request->brand;
        $car->price = $request->price;
        $car->neg_status = $request->status;
        $car->condition = $request->condition;
        $car->year = $request->model;
        $car->km = $request->km;
        $car->color = $request->color;
        $car->cc = $request->cc;
        if($request->spec){
            // dd(serialize(explode(",",$request->spec[3]['specification'])));
            $speckeys = array_keys($request->spec);
            foreach($speckeys as $key){
                // dd(serialize(explode(",",$request->spec[$key]['specification'])));
                $done = $car->specifications()->updateOrCreate(['id'=> $key],[
                    'title' => $request->spec[$key]['title'],
                    'specifications' => serialize(explode(",",$request->spec[$key]['specification']))
                ]);
            }
        }
        $car->update();
        return redirect()->route('cars')->with('success','update successfull');

    }


    public function deletecar($id){
        $car = Car::findorfail($id);
        $image_path = public_path($car->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $car->delete();
        return redirect()->back()->with('success','product deleted successfully');
    }

}
