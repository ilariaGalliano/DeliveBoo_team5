<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }
    public function dishtype(){
        return $this->belongsTo('App\Dishtype');
    }
    public function orders(){
        return $this->belongsToMany('App\Order');
    }


    /**
     * Mass Assignment
     */

    protected $fillable=[
        'restaurant_id',
        'dishtype_id',
        'name',
        'slug',
        'description',
        'allergens',
        'price',
        'visibility',
        'path_image',
        'vegan',
];
}
