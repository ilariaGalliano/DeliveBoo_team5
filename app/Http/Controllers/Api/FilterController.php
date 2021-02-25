<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Restype;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function allrestaurants() {

        $restaurants = Restaurant::all();

        return response()->json($restaurants);

    }

    public function allrestypes() {

        $restypes = Restype::all();

        return response()->json($restypes);

    }
    // TRIALS - FILTER  RESTAURANT SOLO SUL NOME
    public function filterName(Request $request) {

        $data = $request->all();

        $restaurants = Restaurant::where('name', $data['name'])->first();

        return response()->json($restaurants);

    }
    // FILTER  RESTAURANT SU DOPPIO PARAMETRO
    public function filterRestaurants(Request $request) {

        $data = $request->all();

        $name = $data['name'];

        // 1/4 ALL EMPTY , faccio vedere tutto
        if(empty($data['name']) && empty($data['restypes'])) {

            $restaurants = DB::table('restaurants')
            ->orderBy('created_at', 'desc')
            ->get();
        }

        // 2/4 NAME !EMPTY e RESTYPES EMPTY, faccio vedere i ristoranti che corrispondono al nome
        elseif(!empty($data['name']) && empty($data['restypes'])) {

            // NB NON METTERE METODO FIRST - VA IN CONFLITTO!!!
            $restaurants = Restaurant::where('name', 'like', "%$name%")
                // ->select('restaurants.id', 'restaurants.name', 'restaurants.slug')
                ->get();

        }

        // 3/4 NAME EMPTY e RESTYPES !EMPTY, faccio vedere i ristoranti che corrispondono alle categorie selezionate
        elseif ( empty($data['name']) && !empty($data['restypes'])) {

            foreach(($data['restypes']) as $restype) {
                $restaurants = DB::table('restaurants')
                    ->join('restaurant_restype', 'restaurants.id', '=', 'restaurant_restype.restaurant_id')
                    ->join('restypes', 'restypes.id', '=', 'restaurant_restype.restype_id')
                    ->where('restypes.id', $restype)
                    ->get();
            }
        }

        // 4/4 NAME EMPTY e RESTYPES !EMPTY
        else {
            foreach(($data['restypes']) as $restype) {
                $restaurants = DB::table('restaurants')
                    ->join('restaurant_restype', 'restaurants.id', '=', 'restaurant_restype.restaurant_id')
                    ->join('restypes', 'restypes.id', '=', 'restaurant_restype.restype_id')
                    ->where('restypes.id', $restype)
                    ->where('restaurants.name', 'like', "%$name%")
                    ->get();
            }
        }




        return response()->json($restaurants);

    }
}