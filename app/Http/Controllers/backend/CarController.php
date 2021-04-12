<?php

namespace App\Http\Controllers\backend;
use App\Car;
use App\Brand;
use App\Http\Controllers\Controller;
use App\Review;
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
        $cars = Car::query();
        if($request->name){
            $cars = $cars->where('name','like','%'.$request->name.'%');
        }
        if($request->brand){
            $cars =$cars->where('brand_id',$request->brand);
        }
        if($request->price_from){
            $cars =$cars->where('price','>=',$request->price_from);
        }
        if($request->price_to){
            $cars =$cars->where('price','<=',$request->price_to);
        }
        if($request->max_km){
            $cars =$cars->where('km','<=',$request->max_km);
        }
        if($request->sort_by){
            $sort = $request->sort_by;
            if($sort == "az"){
                $cars = $cars->orderBy('name','asc');
            }elseif($sort == "za"){
                $cars = $cars->orderBy('name','desc');
            }elseif($sort == "lh"){
                $cars = $cars->orderBy('price','asc');
            }elseif($sort == "hl"){
                $cars = $cars->orderBy('price','desc');
            }
        }
        $cars = $cars->get();
        $searchdata = $request->all();
        $brands = Brand::all();

        return view('frontent.car',compact('brands','cars','searchdata'));
    }

    public function cardetails($id){
        $car = Car::findorfail($id);
        $reviews = Review::where('car_id', $car->id)->get();
        $similarcars = Car::where('brand_id',$car->brands->id)->where('id','!=',$car->id )->get();
        return view('frontent.cardetails',compact('car','similarcars','reviews'));
    }

    public function buycar(){
        return 'buycarpage';
    }

}
