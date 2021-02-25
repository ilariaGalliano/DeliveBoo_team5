@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.restaurants.index') }}">My Restaurants</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.restaurants.show', $restaurant->slug) }}">{{ $restaurant->name }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dishes.index', $restaurant->slug) }}">Menu</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $dish->name }}</li>
        </ol>
    </nav>
    <h1 class="text-center mb-3">{{ $restaurant->name }} - {{ $dish->name }} </h1>

    <div class="d-flex justify-content-center">
        @if(!empty($dish->path_image))
            <img width="300" src="{{ asset('storage/' .  $dish->path_image) }}" alt="{{ $dish->name }}" class="img-thumbnail mb-3">
        @else
            <img width="300" src="{{ asset('img/no-img.png') }}" alt="no-image" class="img-thumbnail mb-3">
        @endif
    </div>
    

    <ul class="list-group">
        <li class="list-group-item">
            <h4><span class="font-weight-bold">Allergens: </span>{{ $dish->allergens }}</h4>
        </li>
        <li class="list-group-item">
            <h4><span class="font-weight-bold">Price: </span>€ {{number_Format($dish->price, 2, ',', '') }}</h4>
        </li>
        <li class="list-group-item">
            @if ($dish->vegan)
                <h4><span class="font-weight-bold">Vegan: </span>Yes</h4>
            @else
                <h4><span class="font-weight-bold">Vegan: </span>No</h4>
            @endif
        </li>
        <li class="list-group-item">
            @if ($dish->visibility)
                <h4><span class="font-weight-bold">Visible: </span>Yes</h4>
            @else
                <h4><span class="font-weight-bold">Visible: </span>No</h4>
            @endif
        </li>
        <li class="list-group-item">
            <p><span class="font-weight-bold">Description: </span>{{ $dish->description }}</p>
        </li>

    </ul>

    <div class="d-flex align-items-center mb-4">
        <a class="btn btn-warning mr-2 my-2" href="{{ route('admin.dishes.edit', ['slug'=>$restaurant->slug, 'dish'=>$dish->slug]) }}">Edit Dish</a>
        <form action="{{ route('admin.dishes.destroy', ['slug'=>$restaurant->slug, 'dish'=>$dish->slug]) }}" method="POST">
            @csrf
            @method('DELETE')
    
            <input class="btn btn-danger m-2" type="submit" value="Delete Dish">
        </form>
    </div>
    
</div>
@endsection
    