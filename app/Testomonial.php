<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testomonial extends Model
{
    protected $fillable = [
      'image','name','description'
    ];

    public function hasImage(){
        if($this->image){
            if(file_exists(public_path($this->image))){
                return true;
            }
            return false;
        }
        return false;
    }
}
