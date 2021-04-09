<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
