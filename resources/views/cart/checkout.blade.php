@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Checkout</h2>

    <h3>Shipping Information</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" id="lastname" name="lastname" class="form-control">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control">
        </div>

       <div class="form-group">
            <label for="price">Tot.price</label>
            <h4><span> €</span>{{ $total }}</h4>
        </div>

        <div class="form-group">
            <label for="order">Id order</label>
            <input type="text" id="order" name="order" class="form-control">
        </div>

        <div class="form-group">
            <label for="payment_status">payment status</label>
            <input type="text" id="price" name="payment_status" class="form-control">
        </div>

       <button type="submit" class="btn btn-primary mt-3">Place Order</button>


    </form>
</div>
@endsection