<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function dishes(){
        return $this->belongsToMany('App\Dish');
    }

    protected $fillable=[
        'name',
        'lastname',
        'address',
        'email',
        'tot_price',
        'payment_status',
];
    
}
