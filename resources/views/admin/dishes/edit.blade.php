@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.restaurants.index') }}">My Restaurants</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.restaurants.show', $restaurant->slug) }}">{{ $restaurant->name }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dishes.index', $restaurant->slug) }}">Menu</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dishes.show', ['slug'=>$restaurant->slug, 'dish'=>$dish->slug]) }}">{{ $dish->name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Dish</li>
        </ol>
    </nav>
    <h2>Edit your Dish</h2>

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

    <form action="{{ route('admin.dishes.update', ['slug'=>$restaurant->slug, 'dish'=>$dish->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Dish Name <span class="font-italic text-danger">(required)</span></label>
            <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $dish->name) }}">
        </div>
        <div class="form-group">
            <label for="description">Description <span class="font-italic text-danger">(required)</span></label>
            <textarea class="form-control" name="description" id="description">{{ old('description', $dish->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="allergens">Allergens</label>
            <input class="form-control" type="text" id="allergens" name="allergens" value="{{ old('allergens', $dish->allergens) }}">
        </div>
        <div class="form-group">
            <label for="price">Price <span class="font-italic text-danger">(required)</span></label>
            <input class="form-control" type="number" min="0" placeholder="Scroll to insert price (0 - 99)" step="1.00" id="price" name="price" value="{{ old('price', $dish->price) }}">
        </div>
        <div class="form-group">
            <label for="path_image">Add a Dish Image</label>
            @isset($dish->path_image)
                <div class="wrap-image">
                    <img src="{{ asset('storage/' . $dish->path_image) }}" alt="{{ $dish->name }}">
                </div>
                <h6>Change image: </h6>
            @endisset
            <input class="form-control" type="file" name="path_image" accept="image/*">
        </div>
        
        <div class="form-group">
                <label for="vegan">Is your Dish Vegan Friendly?</label>
                <select class="form-control" name="vegan" id="vegan">
                        <option value="1"
                            {{ old('vegan', $dish->vegan) == '1' ? 'selected' : '' }}
                        >Vegan</option>
                        <option value="0"
                            {{ old('vegan', $dish->vegan) == '0' ? 'selected' : '' }}
                        >Not Vegan</option>
                </select>
        </div>

        <div class="form-group">
            <label for="visibility">Is your Dish Visibile? <span class="font-italic text-danger">(required)</span></label>
            <select class="form-control" name="visibility" id="visibility">
                    <option value="1"
                        {{ old('visibility', $dish->visibility) == '1' ? 'selected' : '' }}
                    >Visible</option>
                    <option value="0"
                        {{ old('visibility', $dish->visibility) == '0' ? 'selected' : '' }}
                    >Not Visible</option>
            </select>
        </div>


        <div class="form-group">
            <label for="dishtype_id">Type of Dish<span class="font-italic text-danger">(required)</span></label>
            <select class="form-control" name="dishtype_id" id="dishtype_id">
                @foreach ($dishtypes as $dishtype)
                    <option value="{{ $dishtype->id }}"
                        @if ($dish->dishtype_id == ($dishtype->id)) selected @endif
                    >{{ $dishtype->dishtypes_status }}</option>
                @endforeach
            </select>
        </div>

        <input class="btn btn-primary" type="submit" value="Save Dish">
    
    </form>

</div>
@endsection
