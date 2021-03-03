<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function car(){
        return $this->hasMany(Car::class,'brand_id','id');
    }
}
