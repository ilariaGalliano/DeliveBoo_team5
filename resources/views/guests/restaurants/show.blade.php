@extends('layouts.client')

@section('content')
<div class="container">

    <h1 class="text-center mt-5 mb-3">Welcome to <span class="text-primary font-weight-bold"> {{ $restaurant->name }}</span> restaurant</h1>
    <p class="mb-2 text-center">
        <span class="font-weight-bold">Restaurant tags:</span>
        @forelse ($restaurant->restypes as $restype)
           <span class="badge badge-secondary text-uppercase">{{$restype->restypes_status}}</span>{{!$loop->last ? ',' : ''}}
        @empty
            No restaurant tags
        @endforelse
    </p>
    <div class="d-flex justify-content-center my-4">
        {{-- {-- IMG ! empty --}}
        @if (!empty($restaurant->path_image))
            <img class="rounded" width=200 src="{{ asset('storage/' . $restaurant->path_image) }}" alt="{{ $restaurant->name }}">
        @else
            <img class="rounded" width=200 src="{{ asset('img/no-img.png' ) }}" alt="{{ $restaurant->name }}">
        @endif
    </div>
    <div class="rounded p-2 row" width=50% style="background: white">
        <h5 class="col-12 mb-5">
            <span class="font-weight-bold">Who we are:</span>
            {{ $restaurant->body }}
        </h5>
        <h5 class="col-6"><span class="font-weight-bold">Delivery Price: </span>€ {{number_Format($restaurant->delivery_price, 2, ',', '') }}</h5>
        <h5 class="col-6">
            <span class="font-weight-bold">Address:</span>
            {{ $restaurant->address }}
        </h5>
    
        @if (!empty($restaurant->min_order))
            <h5 class="col-6"><span class="font-weight-bold">Min Order: </span>€ {{number_Format($restaurant->min_order, 2, ',', '') }}</h5>
        @else
            <h5 class="col-6">Min Order: No Min Order!</h5>
        @endif
        <h5 class="col-6"><span class="font-weight-bold">Open hours:</span>  {{ $restaurant->open_hours }}</h5>

    </div>

 
    {{-- MENU --}}
    <h3 class="my-5 text-center">Our <span class="font-weight-bold">MENU</span>: </h3>
    {{-- IF THERE ARE DISHES , VISIBLE --}}
    <div class="d-flex">
        @forelse ($dishes as $dish)
            @if ($dish->visibility == 1)
                    {{-- PRODUCT CARDS --}}
                    <div class="card m-3" style="width: 18rem;">
                        @if (!empty($dish->path_image))
                            <img class="card-img-top" width=200 src="{{ asset('storage/' . $dish->path_image) }}" alt="{{ $dish->name }}">
                        @else
                            <img class="card-img-top" src="{{ asset('img/no-img.png' ) }}" alt="{{ $dish->name }}">
                        @endif
                        <div class="card-body">
                            <div class="card-header">
                                <h5>{{ $dish->name }}</</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $dish->description }}</li>
                                <li class="list-group-item">
                                    @if ($dish->dishtype_id == 1)
                                        Appetizer
                                    @elseif ($dish->dishtype_id == 2)
                                        Main Course
                                    @elseif ($dish->dishtype_id == 3)
                                        Second
                                    @elseif ($dish->dishtype_id == 4)
                                        Sides
                                    @elseif ($dish->dishtype_id == 5)
                                        Dessert
                                    @else
                                        Beverage                                
                                    @endif
                                    {{-- {{ $dish->dishtype_id }} --}}
                                </li>
                                <li class="card-title list-group-item">Price: € {{number_Format($dish->price, 2, ',', '') }}</li>
                            </ul>
                            <a href="{{ route('add', $dish->id) }}" class="btn btn-primary m-auto">ADD TO CART</a>
                        </div>
                    </div>
            @endif
        @empty
            {{-- IF THERE ARE NO DISHES / ALL NOT VISIBLES--}}
            <p class="text-danger">No dishes yet! Come back soon to check!</a></p>
            <a class="btn btn-primary" href="{{ route('restaurants.index') }}">Come back to the Restaurants list</a>
        @endforelse 
    </div>

</div>
@endsection
    
