@extends('layouts.client')

@section('content')   
<body id="homepage">
    <section id="home-section-1">
        <!-- TYPING ANIMATION TITLE -->
        <div id="type-anim">
            <h1>DeliveBoo is </h1>
            <h1 class="typing"></h1>
        </div> 
         <!-- LINK/BUTTON TO RESTAURANT LIST INDEX -->
        <div class="btn-container">
            <div class="button" id="learn-more">
                <a href="{{ route('restaurants.index') }}">Scopri di più</a>
            </div>
        </div>      
        <div class="img-container" id="lilgirl">
            <img src="{{ asset('img/gir.png') }}" alt="">
        </div>
    </section>
    <section id="home-section-2">
        <div class="links-container">
            <div id="up">
                <div class="images">
                    <img src="{{ asset('img/pizza.png') }}" alt="">
                </div>
                <div class="images">
                    <img src="{{ asset('img/smoothie.png') }}" alt="">
                </div>
            </div>
            
            <div id="down">
                <div class="images">
                    <img src="{{ asset('img/sushi.png') }}" alt="">
                </div>
                <div class="images">
                    <img src="{{ asset('img/hamburger.png') }}" alt="">
                </div>
            </div>
           
        </div>
    </section>
    <!-- ONLY HOMEPAGE SCRIPT LINK -->
    <script src="{{ asset('js/homepage.js') }}" defer></script>
</body>
   
   
@endsection

