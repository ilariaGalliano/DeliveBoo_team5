<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

class CartController extends Controller
{
    public function add($id){
        //dd($dish_id);
        //dd($dish);
        $dish = Dish::findOrFail($id);

        // add the product to cart
        // lo slash \ serve per importare cart senza usare lo use con il pacchetto installato 
        \Cart::session('_token')->add(array(
            'id' => $dish->id,
            'name' => $dish->name,
            'price' =>  $dish->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' =>  $dish
        ));

        return redirect()->route('cart.index');
    }

    public function index(){

        $cartDishes = \Cart::session('_token')->getContent();
        return view('cart.index', compact('cartDishes'));
    }

    public function destroy($dishId){

        \Cart::session('_token')->remove($dishId);
        return back();
    }

    public function update($rowId){

        \Cart::session('_token')->update($rowId,[
            // per salvare nel carrello da 0 senza che aggiunge alla vecchia quantità selezionata
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);
        return back();
    }

    public function checkout(){

        $total = \Cart::session('_token')->getTotal();
        return view('cart.checkout', ['total' => $total]);
    }

    public function saveCookie(){

        $savedCookie = \Cart::make('order', json_encode(\Cart::session('_token')->getContent(), 20));

        dd($savedCookie);

        return view('cart.order', compact('savedCookie'));
    }

}
