<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){


        // dd($request->all());
       $data = $request->all();
    
        $request->validate([
            'name' => 'required|max:20',
            'lastname' => 'required|max:30',
            'address' => 'required|max:80',
            'email' => 'required|max:50',
            'tot_price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'payment_status' => 'required',
        ]);

        $order = new Order();

        $order->name = $request->input('name');
        $order->lastname = $request->input('lastname');
        $order->address = $request->input('address');
        $order->email = $request->input('email');
        $order->payment_status = $request->input('payment_status');

        $order->tot_price = \Cart::session('_token')->getTotal();

        $order->fill($data); // fillable
        $order->save();
        //dd('order created', $order);
        // save order dishes

        /* $cartDishes = \Cart::session('_token')->getContent();

        foreach ($cartDishes as $dish) {
           $order->dishes()->attach($dish->id);
           // prezzo?? quantità??
        } */

        
        return 'thank you for your order :)';
       /*  if($sav){
            // Se restypes_status non è vuoto, fare questo per unire i restypes e i restaurant nella pivot 
            if(!empty($data['restypes_status'])){
                $newRestaurant->restypes()->attach($data['restypes_status']);
            }
                return redirect()->route('admin.restaurants.index');
        }
            else{
                return redirect()->route('home');
            } */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
