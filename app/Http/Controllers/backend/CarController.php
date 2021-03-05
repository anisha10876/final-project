<?php

namespace App\Http\Controllers\backend;
use App\Car;
use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function searchcar(Request $request){
        $searchcar = Car::where('name', 'like', '%' . $request->search . '%')->get();
        // dd($searchcar);
        return view('backend.partial.searchcar',compact('searchcar'));
    }


    public function carbrand(Request $request,$id){
        $brand = Brand::findorfail($id);

        $carbrands = Car::where('brand_id',$id)->get();
        return view('backend.partial.filtercars',compact('carbrands'));
    }

    public function filtercars(Request $request){
        $brand = Brand::findorfail($request->brand);
        $brands = Brand::all();
        $carbrands = Car::where('brand_id',$request->brand)->get();

        return view('backend.partial.filtercars',compact('brand','brands','carbrands'));
    }

    public function cardetails($id){
        $car = Car::findorfail($id);
        // dd($car->brands->id);
        $similarcars = Car::where('brand_id',$car->brands->id)->where('id','!=',$car->id )->get();

        return view('frontent.cardetails',compact('car','similarcars'));
    }
    public function buycar(){
        return 'buycarpage';
    }



}
