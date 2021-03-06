<?php

namespace App\Http\Controllers\backend;

use App\Brand;
use App\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getbrand(){
        $brands=Brand::all();
        return view('backend.brands',compact('brands'));
    }
    public function addbrand(){
        return view('backend.add_brand');
    }
    public function postbrand(Request $request){
//        dd($request);
        $brand = new Brand();
        $brand->name=$request->name;
        $brand->slug= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));;
        $brand->save();
        return redirect()->route('brands');


    }
    public function geteditbrand($id){
        $brand=Brand::find($id);
        return view('backend.editbrand',compact('brand'));
    }
    public function posteditbrand(Request $request,$id){
        $brand=Brand::find($id);
        $brand->name=$request->name;
        $brand->update();
        return redirect()->route('brands');
    }
    public function getdeletebrand($id){
        $brand=Brand::find($id);
        $carbrand = Car::where('brand_id',$id)->first();
        if($carbrand){
            return redirect()->back()->with('error','cant delete');
        }
        $brand->delete();
        return redirect()->route('brands');
    }

}
