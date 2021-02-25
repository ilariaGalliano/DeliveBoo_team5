<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restype extends Model
{
    public function restaurants(){
        return $this->belongToMany('App\Restaurant');
    }
}
