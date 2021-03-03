<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specifications extends Model
{
    protected $fillable = [
        'title', 'specifications'
    ];
    public function car(){
        return $this->belongsTo(Specifications::class,'car_id');
    }
}
