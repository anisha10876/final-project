<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Car extends Model
{
    protected $fillable = [
        'name','image', 'broucher','description','brand_id','price','neg_status','condition','year','model','km','color','cc'
    ];


    public function brands(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function specifications(){
        return $this->hasMany(Specifications::class,'car_id');
    }

    public function hasImage(){
        if($this->image){
            if(file_exists(public_path($this->image)))
                return true;
            return false;
        }
        return false;
    }

    public function user(){
        $userCar = UserCar::where('car_id', $this->id)->first();
        if($userCar){
            return $userCar->user->name;
        }else{
            return "Admin";
        }
    }

    public function getCondition(){
        switch($this->condition){
            case "brand_new":
                return "Brand New";
                break;
            case "used":
                return "Used";
                break;
            case "old":
                return "Old";
                break;
            default:
                return "";
                break;
        }
    }

    public function calculateResale(){
        $price = $this->price;
        $currentYear = Carbon::now()->format('Y');
        $modelYear = $this->year;
        $year_diff = $modelYear ? $currentYear - $modelYear : 0;
        // dd(pow(2,3));
        $resale_value = $this->price*(pow((1-0.07),$year_diff));
        return (int)$resale_value;
    }

}
