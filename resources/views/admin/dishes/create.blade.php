@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.restaurants.index') }}">My Restaurants</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.restaurants.show', $restaurant->slug) }}">{{ $restaurant->name }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dishes.index', $restaurant->slug) }}">Menu</a></li>
          <li class="breadcrumb-item active" aria-current="page">New Dish</li>
        </ol>
    </nav>
    <h2>Create your New Dish</h2>

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

    <form action="{{ route('admin.dishes.store', $restaurant->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="name">Dish Name <span class="font-italic text-danger">(required)</span></label>
            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="description">Description <span class="font-italic text-danger">(required)</span></label>
            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="allergens">Allergens</label>
            <input class="form-control" type="text" id="allergens" name="allergens" value="{{ old('allergens') }}">
        </div>
        <div class="form-group">
            <label for="price">Price <span class="font-italic text-danger">(required)</span></label>
            <input class="form-control" type="number" min="0" placeholder="Scroll to insert price (0 - 99)" step="1.00" id="price" name="price" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <label for="path_image">Add a Dish Image</label>
            <input class="form-control" type="file" id="path_image" name="path_image" accept="image/*">
        </div>
        
        <div class="form-group">
                <label for="vegan">Is your Dish Vegan Friendly?</label>
                <select class="form-control" name="vegan" id="vegan">
                        <option value="1"
                            {{ old('vegan') == '1' ? 'selected' : '' }}
                        >Vegan</option>
                        <option value="0"
                            {{ old('vegan') == '0' ? 'selected' : '' }}
                        >Not Vegan</option>
                </select>
        </div>

        <div class="form-group">
            <label for="visibility">Is your Dish Visibile? <span class="font-italic text-danger">(required)</span></label>
            <select class="form-control" name="visibility" id="visibility">
                    <option value="1"
                        {{ old('visibility') == '1' ? 'selected' : '' }}
                    >Visible</option>
                    <option value="0"
                        {{ old('visibility') == '0' ? 'selected' : '' }}
                    >Not Visible</option>
            </select>
        </div>
    

        <div class="form-group">
            <label for="dishtype_id">Type of Dish<span class="font-italic text-danger">(required)</span></label>
            <select class="form-control" name="dishtype_id" id="dishtype_id">
                @foreach ($dishtypes as $dishtype)
                    <option  value="{{ $dishtype->id }}"
                    >{{ $dishtype->dishtypes_status }}</option>
                @endforeach
            </select>
        </div>

        <input class="btn btn-primary" type="submit" value="Create Dish">
    
    </form>
    
</div>
@endsection
