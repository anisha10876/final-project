<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name','image','brand_id','price','neg_status','condition','year','model','km','color','cc'
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
}
