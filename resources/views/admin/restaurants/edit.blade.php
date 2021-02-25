@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.restaurants.index') }}">My Restaurants</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.restaurants.show', $restaurant->slug) }}">{{ $restaurant->name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Restaurant</li>
        </ol>
    </nav>
    <h2>Edit your Restaurant</h2>

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

    <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Restaurant Name <span class="font-italic text-danger">(required)</span></label>
            <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $restaurant->name) }}">
        </div>
        <div class="form-group">
            <label for="vat">VAT Number <span class="font-italic text-danger">(required)</span></label>
            <input class="form-control" type="text" id="vat" name="vat" value="{{ old('vat', $restaurant->vat) }}">
        </div>
        <div class="form-group">
            <label for="address">Restaurant Address <span class="font-italic text-danger">(required)</span></label>
            <input class="form-control" type="text" id="address" name="address" value="{{ old('address', $restaurant->address) }}">
        </div>
        <div class="form-group">
            <label for="body">Tell us a bit about your Restaurant <span class="font-italic text-danger">(required)</span></label>
            <textarea class="form-control" name="body" id="body">{{ old('body', $restaurant->body) }}</textarea>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number <span class="font-italic text-danger">(required)</span></label>
            <input class="form-control" type="text" id="phone" name="phone" value="{{ old('phone', $restaurant->phone) }}">
        </div>
        <div class="form-group">
            <label for="delivery_price">Delivery price <span class="font-italic text-danger">(required)</span></label>
            <input class="form-control" type="number" min="1" step="1.00" min="0" placeholder="Scroll to insert price (0 - 9)" id="delivery_price" name="delivery_price" value="{{ old('delivery_price', $restaurant->delivery_price) }}">
        </div>
        <div class="form-group">
            <label for="min_order">Min Order</label>
            <input class="form-control" type="number" min="0" step="1.00" min="0" placeholder="Scroll to insert price (0 - 9)" id="min_order" name="min_order" value="{{ old('min_order', $restaurant->min_order) }}">
        </div>
        {{-- IMAGE --}}
        <div class="form-group">
            <label for="path_image">Logo Image</label>
            @isset($restaurant->path_image)
                <div class="wrap-image">
                    <img src="{{ asset('storage/' . $restaurant->path_image) }}" alt="{{ $restaurant->title }}">
                </div>
                <h6>Change image: </h6>
            @endisset
            <input class="form-control" type="file" name="path_image" accept="image/*">
        </div>

        <div class="form-group">
            <label for="open_hours">Open Hours <span class="font-italic text-danger">(required)</span></label>
            <input class="form-control" type="text" id="open_hours" name="open_hours" value="{{ old('open_hours', $restaurant->open_hours) }}">
        </div>

        <div class="form-group">
            <p>Choose 1+ Category for your Restaurant <span class="font-italic text-danger">(required)</span></p>
            @foreach ($restypes as $restype)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="restypes_status[]" id="restype-{{ $restype->id }}" value="{{ $restype->id }}"
                    @if ($restaurant->restypes->contains($restype->id)) checked @endif
                    >
                    <label class="text-capitalize" for="restype-{{ $restype->id }}">{{ $restype->restypes_status }}</label>
                </div>
            @endforeach
        </div>


        <input class="btn btn-primary" type="submit" value="Save Restaurant">
    
    </form>

</div>
@endsection