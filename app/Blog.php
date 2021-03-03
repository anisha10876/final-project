<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'name','image','author','description'
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
