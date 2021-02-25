<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function dishes(){
        return $this->hasMany('App\Dish');
    }
    public function restypes(){
        return $this->belongsToMany('App\Restype');
    }

    /**
     * Mass Assignment
     */

    protected $fillable=[
            'user_id',
            'name',
            'slug',
            'vat',
            'address',
            'body',
            'phone',
            'delivery_price',
            'min_order',
            'path_image',
            'open_hours',
    ];
}
