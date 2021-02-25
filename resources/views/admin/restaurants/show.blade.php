@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.restaurants.index') }}">My Restaurants</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $restaurant->name }}</li>
        </ol>
    </nav>
    <h1 class="text-center mb-3">{{ $restaurant->name }}</h1>
    <h5 class="mt-2">
        <span class="font-weight-bold">Restaurant tags: </span>
        @forelse ($restaurant->restypes as $restype)
           <span class="badge badge-dark text-uppercase">{{$restype->restypes_status}}</span>{{!$loop->last ? ',' : ''}}
        @empty
            <p>No restaurant tags</p>
        @endforelse
    </h5>

    <div class="d-flex justify-content-center">
        @if(!empty($restaurant->path_image))
            <img width="300" src="{{ asset('storage/' .  $restaurant->path_image) }}" alt="{{ $restaurant->name }}" class="img-thumbnail mb-3">
        @else
            <img width="300" src="{{ asset('img/no-img.png') }}" alt="no-image" class="img-thumbnail mb-3">
        @endif
    </div>



    <div class="d-flex justify-content-center">
        <a class="btn btn-primary m-2 mb-4" href="{{ route('admin.dishes.index', $restaurant->slug) }}">Manage Food</a>
        <a class="btn btn-primary m-2 mb-4" href="{{ route('admin.dishes.index', $restaurant->slug) }}">Manage Orders</a>
    </div>

    <ul class="list-group">
        <li class="list-group-item">
            <h4><span class="font-weight-bold">VAT Number: </span>{{ $restaurant->vat }}</h4>
        </li>
        <li class="list-group-item">
            <h4><span class="font-weight-bold">Address: </span>{{ $restaurant->address }}</h4>
        </li>
        <li class="list-group-item">
            <h4><span class="font-weight-bold">Phone: </span>{{ $restaurant->phone }}</h4>
        </li>
        <li class="list-group-item">
            <h4><span class="font-weight-bold">Delivery Price: </span>€ {{number_Format($restaurant->delivery_price, 2, ',', '') }}</h4>
        </li>
        <li class="list-group-item">
            @if (!empty($restaurant->min_order))
                <h4><span class="font-weight-bold">Min Order: </span>€ {{number_Format($restaurant->min_order, 2, ',', '') }}</h4>
            @else
                <h4><span class="font-weight-bold">Min Order: </span>No Min Order!</h4>
            @endif
        </li>
        <li class="list-group-item">
            <h4><span class="font-weight-bold">Open Hours: </span>{{ $restaurant->open_hours }}</h4>
        </li>
        <li class="list-group-item">
            <p><span class="font-weight-bold">Description: </span>{{ $restaurant->body }}</p>
        </li>

    </ul>

    <div class="d-flex align-items-center mb-4">
        <a class="btn btn-warning m-2" href="{{ route('admin.restaurants.edit',             $restaurant->slug) }}">Edit Restaurant</a>
        <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST">
            @csrf
            @method('DELETE')
    
            <input class="btn btn-danger m-2" type="submit" value="Delete Restaurant">
        </form>
    </div>
    
</div>
@endsection
    