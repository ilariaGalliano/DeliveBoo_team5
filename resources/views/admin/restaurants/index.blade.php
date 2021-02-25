@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">My Restaurants</li>
        </ol>
    </nav>
    <h1>List of your Restaurants</h1>

    {{-- DESTROY --}}
    @if(session('restaurant-deleted'))
        <div class="alert alert-danger">
            <p><span class="font-weight-bold">{{ session('restaurant-deleted') }}</span> has been cancelled correctly.</p>
        </div>
    @endif

    @if ($restaurants->isEmpty())
        <h4 class="text-danger">There are no restaurants, yet. Create your fist restaurant <a href="{{ route('admin.restaurants.create') }}">here</a></h4>
    @else
        <div class="d-flex justify-content-center">
            <a class="btn btn-success mb-2 my-2 text-center" href="{{ route('admin.restaurants.create') }}">Create a New Restaurant</a>
        </div>
        <ul class="mt-4 p-1 list-group" >
            @foreach ($restaurants as $restaurant)
                <li class="list-group-item d-flex flex-column border mb-2">
                    <div class="d-flex  justify-content-between p-2">
                        <div class="d-flex flex-column mr-2 text-center p-1">
                            <h4>Name:</h4>
                            <h5>{{ $restaurant->name }}</h5>
                        </div>
                        <div class="d-flex flex-column mr-2 text-center p-1">
                            <h4>VAT Number:</h4>
                            <h5>{{ $restaurant->vat }}</h5>
                        </div>
                        <div class="d-flex flex-column mr-2 text-center p-1">
                            <h4>Address:</h4>
                            <h5>{{ $restaurant->address }}</h5>
                        </div>
                        <div class="d-flex flex-column mr-2 text-center p-1">
                            <h4>Phone Number:</h4>
                            <h5>{{ $restaurant->phone }}</h5>
                        </div>
                        <div class="d-flex flex-column mr-2 text-center p-1">
                            <h4>Created at:</h4>
                            <h5>{{ $restaurant->created_at->diffForHumans() }}</h5>
                        </div>
                    </div>
                    <div class="">
                        <a class="btn btn-primary m-2" href="{{ route('admin.restaurants.show', $restaurant->slug) }}">Manage this Restaurant</a>
                    </div>
                </li>
            @endforeach
        </ul>

    @endif

</div>
@endsection
