<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'designation','name','image','description'
    ];


    public function hasImage(){
        if($this->image){
            if(file_exists(public_path($this->image)))
                return true;
            return false;
        }
        return false;
    }
}
