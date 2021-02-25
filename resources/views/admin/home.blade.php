@extends('layouts.app')
​
@section('content')
<div class="container d-flex align-items-center flex-column">
    <h1 class="text-center">Admin Dashboard</h1>
    <h3>You are logged in!</h3>
    <a class="btn btn-primary mt-4" style="width: 200px;" href="{{ route('admin.restaurants.index') }}">Manage your Restaurants</a>
    <a class="btn btn-success mt-4" style="width: 200px;" href="{{ route('admin.restaurants.create') }}">Create a NEW Restaurant</a>
</div>
@endsection