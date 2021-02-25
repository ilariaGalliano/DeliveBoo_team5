@extends('layouts.app')

@section('content')
<div class="container">
   <h2>Your cart</h2>

   
       <table>
           <thead>
            <tr>
               <th>Name</th>
               <th>Price</th>
               <th>Quantity</th>

               <th>Action</th>
            </tr>
           </thead>
           <tbody> 
    @foreach ($cartDishes as $dish)

               <tr>
                   <td width="200" scope="row">{{ $dish->name }}</td>
                   <td>
                       tot.singolo{{ $dish->price }}, tot.

                       {{\Cart::session('_token')->get($dish->id)->getPriceSum()}}
                    </td>
                   <td>
                      <form action="{{ route('cart.update', $dish->id) }}">
                        <input name="quantity" type="number" value="{{ $dish->quantity }}">
                        <input type="submit" value="save">
                    
                      </form>
                      
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('cart.destroy', $dish->id) }}">Delete</a>
                     </td>
               </tr> 
    @endforeach
           </tbody>
           
       </table>
   
        <h3>
            Total price:  € {{\Cart::session('_token')->getTotal()}}
        </h3>

        <a role="button" class="btn btn-primary" href="{{ route('cart.checkout') }}">Proceed with payment</a>

</div>
@endsection