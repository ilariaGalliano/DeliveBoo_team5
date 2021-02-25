@extends('layouts.client')

@section('content')
<body id="index">
<div id="filter" class="container">
    <h1 class="text-center mt-5 mb-3 text-primary">SEARCH YOUR RESTAURANT</h1>

    {{-- SEARCH --}}
    <div class="research-container">
            <label for="name">Insert name or part of the name of the Restaurant: </label>
            <input type="text" name="name" v-model="name" {{-- v-on:keyup="filter" --}}>
            {{-- <button @click="filter" 
            >Find Restaurant!
            </button> --}}
            <p >And / Or choose what you'd like to eat:</p>
            <ul class="restype-checkbox">
                @foreach ($restypes as $restype)
                <div class="switch-container">
                    <span>{{ $restype->restypes_status }}</span>
                    <li class="toggle">
                        <input type="checkbox" id="{{ $restype->id }}" value="{{ $restype->id }}" v-model="restypes"
                        {{-- v-on:change="filter" --}}>
                        <label class="label" for="{{ $restype->id }}"></label>
                    </li>
                </div>   
                   
                @endforeach
            </ul>
            
                <button class="button" @click="filter" > Find !
            </button>
                
           
        
    </div>

    {{-- SHOW RESULTS --}}
    <div>
        <h4>List of choice, upon your research: </h4>
        <div v-if="filteredRestaurants.length > 0">
            
            <ul class="list-group">
              
            </ul> 
        </div>
        <h5 v-else class="text-danger" >Sorry, No restaurant to show! Please, try again</h5>
    </div>
        <ul id="restaurants-filtered">
            <li  v-for="filteredRestaurant in filteredRestaurants">
               <div  class="container-card">
                     <div class="card" id="zumba">
                         <div class="img-bx">
                             <!-- <img src="@{{ filteredRestaurant.path_image }}" alt=""> -->
                         </div>
                         <div class="content-bx">
                             <h2>@{{ filteredRestaurant.name }}</h2>
                             <a :href="`http://127.0.0.1:8000/restaurants/${filteredRestaurant.slug}`">Show Menu</a>
                         </div>
                     </div>
              </div>
            </li>
        </ul>
            
        

</div> 


             
</body>

 
    
    
@endsection