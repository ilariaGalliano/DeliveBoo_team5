@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.restaurants.index') }}">My Restaurants</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.restaurants.show', $restaurant->slug) }}">{{ $restaurant->name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Menu</li>
        </ol>
    </nav>

    <h1>{{ $restaurant->name }} - Menu </h1>

        {{-- DESTROY --}}
       @if(session('dish-deleted')) 
        <div class="alert alert-danger">
            <p><span class="font-weight-bold">{{ session('dish-deleted') }}</span> has been cancelled correctly.</p>
        </div>
           
        @endif

        @if ($dishes->isEmpty())
            <h4 class="text-danger">There are no dishes, yet. Create your fist dish <a href="{{ route('admin.dishes.create', $restaurant->slug) }}">here</a></h4>
        @else
            <div class="d-flex justify-content-center">
                <a class="btn btn-success mb-2 my-2 text-center" href="{{ route('admin.dishes.create', $restaurant->slug) }}">Create a New Dish</a>
            </div>
            
            <ul class="list-group mt-4">
                @foreach ($dishes as $dish)
                    <li class="list-group-item d-flex flex-column mb-2">
                        <div>
                            <h4><span class="font-weight-bold">Dish Name: </span>{{ $dish->name }}</h4>
                            @if ($dish->visibility)
                                <h4><span class="font-weight-bold">Visible: </span>Yes</h4>
                            @else
                                <h4><span class="font-weight-bold">Visible: </span>No</h4>
                            @endif
                        </div>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-primary mr-2 my-2" href="{{ route('admin.dishes.show', ['slug'=>$restaurant->slug, 'dish'=>$dish->slug]) }}">Show Dish</a> 
                            <a class="btn btn-warning m-2" href="{{ route('admin.dishes.edit', ['slug'=>$restaurant->slug, 'dish'=>$dish->slug]) }}">Edit Dish</a>
                            <form action="{{ route('admin.dishes.destroy', ['slug'=>$restaurant->slug, 'dish'=>$dish->slug]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                        
                                <input class="btn btn-danger m-2" type="submit" value="Delete Dish">
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
            
        @endif
     
</div>
@endsection