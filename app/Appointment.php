<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function car(){
        return $this->belongsTo(Car::class,'car_id');
    }
}
