<?php

namespace App\Http\Controllers\Frontend;

use App\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CompareController extends Controller
{
    public function index(Request $request){
        $cars = Car::all();
        $car_ids = session('compare_ids');
        if(!$car_ids){
            Toastr::error("Add Cars To Comparision First", "No Cars Found");
            return redirect()->route('home');
        }
        // dd($car_ids);
        if(count($car_ids) > 0){
            $compare_cars = Car::whereIn('id', $car_ids)->get();
        //     $comparision = $this->getComparision($compare_cars);
        //     $compare_cars = [$car1, $car2];
            return view('frontent.compare',compact('compare_cars'));
        }
        return view('frontent.compare',compact('cars'));
    }

    public function addToCompare(Request $request, $id){
        $allCars = session('compare_ids') ?? null;
        if(!$allCars){
            session(['compare_ids' => [$id]]);
            Toastr::success("Add more cars for better review.","New Car Added To Comparision");
            return redirect()->back();
        }elseif(in_array($id, $allCars)){
            Toastr::error("Car already added to comparision","Invalid action");
            return redirect()->back();
        }elseif(count($allCars) >= 3){
            Toastr::error("Cannot add more than 3 cars","Maximum car for comparision reached");
            return redirect()->back();
        }else{
            $value = session('compare_ids');
            array_push($value, $id);
            session(['compare_ids' => $value]);
            Toastr::success("New Car Added To Comparision","Operation Success");
            return redirect()->back();
        }
    }

    public function removeFromCompare($id){
        $value = session('compare_ids');
        foreach($value as $key=>$val){
            if($val == $id){
                unset($value[$key]);
            }
        }
        session(['compare_ids' => $value]);
        Toastr::success("Car Removed From Comparision", "Operation Success");
        if(count($value) == 0){
            return redirect('/');
        }
        return redirect()->back();
    }

    public function getComparision($compare_cars){
        if($compare_cars->count() < 2){
            return [
                'year'=>0,
                'km' => 0,
                'cc' => 0,
                'condition' => 0
            ];
        }
        $km = 0;
        $highestKm =  $compare_cars->max('km');
        $lowestKm = $compare_cars->min('km');
        foreach($compare_cars as $car){

        }
        $carWithHighKm = $compare_cars->where('km', $highestKm);
        if($carWithHighKm->count() > 1){
            $km = 0;
        }else{
            $km = $carWithHighKm->first()->id;
        }
        dd($km);
        $cc = 0;
        if($car1->cc > $car2->cc){
            $cc = $car1->id;
        }elseif($car1->cc < $car2->cc){
            $cc = $car2->id;
        }
        $year = 0;
        if($car1->year > $car2->year){
            $year = $car1->id;
        }elseif($car1->year < $car2->year){
            $year = $car2->id;
        }
        $condition = 0;
        if($car1->condition == "brand_new" && ($car2->condition == "old" || $car2->condition == "used")){
            $condition = $car1->id;
        }elseif($car1->condition == "used" && $car2->condition == "old"){
            $condition = $car2->id;
        }elseif($car2->condition == "brand_new" && ($car1->condition == "old" || $car1->condition == "used")){
            $condition = $car1->id;
        }elseif($car2->condition == "used" && $car1->condition == "old"){
            $condition = $car2->id;
        }
        return [
            'year'=>$year,
            'km' => $km,
            'cc' => $cc,
            'condition' => $condition
        ];
    }
}
