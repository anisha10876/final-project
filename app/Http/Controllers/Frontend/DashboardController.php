<?php

namespace App\Http\Controllers\frontend;

use App\Appointment;
use App\Brand;
use App\Car;
use App\Http\Controllers\Controller;
use App\UserCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::user()->role_id == 1){
            return redirect()->route('admindashboard');
        }
        $brands = Brand::all();
        $user_cars = UserCar::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('frontent.userDashboard',compact('brands','user_cars'));
    }


    public function submitAppointment(Request $request){
        // dd($request);
        $appointment = new Appointment();
        $appointment->user_id = Auth::user()->id;
        $appointment->car_id = $request->car_id;
        $appointment->phone = $request->phone;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->reason = $request->reason;
        $appointment->location = $request->location;
        $appointment->save();

        return redirect()->route('appointmentConfirm',$appointment->id);
    }

    public function confirmAppointment($id){
        $appointment = Appointment::find($id);
        return view('frontent.appointmentConfirm',compact('appointment'));
    }

    public function sellcar(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:40|min:5',
            'image' => 'required|image',
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

        $userCar = new UserCar();
        $userCar->car_id = $car->id;
        $userCar->user_id = Auth::user()->id;
        $userCar->status = "on_sale";
        $userCar->save();

        return redirect()->back()->with('success','New Car Added Successfully');

    }
}
