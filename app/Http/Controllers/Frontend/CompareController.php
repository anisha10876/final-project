<?php

namespace App\Http\Controllers\frontend;

use App\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index(Request $request){
        $cars = Car::all();
        if($request->car_1 && $request->car_2){
            $car1 = Car::find($request->car_1);
            $car2 = Car::find($request->car_2);
            $comparision = $this->getComparision($car1, $car2);
            $compare_cars = [$car1, $car2];
            return view('frontent.compare',compact('cars','car1','car2','comparision','compare_cars'));
        }
        return view('frontent.compare',compact('cars'));
    }

    public function getComparision($car1, $car2){
        $km = 0;
        if($car1->km < $car2->km){
            $km = $car1->id;
        }elseif($car1->km > $car2->km){
            $km = $car2->id;
        }
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
