<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Dish;
use App\Restype;

class RestaurantController extends Controller
{
    public function index(){
        // paginate
        $restaurants = Restaurant::orderBy('created_at', 'desc')->get();
        $restypes = Restype::all();
        return view('guests.restaurants.index', compact('restaurants', 'restypes'));
    }

    public function show($slug){
        // prende il primo slug 
        $restaurant = Restaurant::where('slug', $slug)->first();
        // id dell'oggettto che abbiamo appena creato
        $dishes = Dish::where('restaurant_id', $restaurant['id'])->get();

        return view('guests.restaurants.show', compact('restaurant', 'dishes'));
    }
}
