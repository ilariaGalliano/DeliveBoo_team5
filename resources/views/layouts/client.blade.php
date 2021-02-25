<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/client.js') }}" defer></script>
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- HEADER -->
        <header>
            <nav id="header-navbar"> 
                    <a id="logo-title" href="{{ url('/') }}">
                        DeliveBoo
                    </a>

                    <div id="navbar-links">
                        <!-- Hamburger Icon menu -->
                        <div class="navbar-ul" id="hamburger-menu">
                                <div  onclick="toggleHamburger()"><i class="fas fa-bars"></i></div>     
                        </div>
                        <div class="menu">
                            <div class="toggle-menu" id="times" onclick="toggleHamburger()"><i class="fas fa-times"></i></div> 
                             <ul>
                                 <li><a href="">Home</a></li>
                                 <li><a href="">Restaurants</a></li>
                                 <li><a href="">Login</a></li>
                                 <li><a href="">Register</a></li>
                                 <li><a href="">Cart</a></li>
                             </ul>      
                        </div>
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-ul">
                            <li class="button" id="search-restaurant">
                                <a  href="{{ route('restaurants.index') }}">Search Restaurant</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-ul">
                            <!-- Authentication Links -->
                            @guest
                                <li class="button" >
                                    <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="button" >
                                        <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                <li class="button">
                                    <a class="nav-link" href="{{ route('cart.index') }}">
                                     Cart

                                    <div class="badge badge-danger">
                                        {{\Cart::session('_token')->getContent()->count()}}
                                    </div>
                                    </a>
                                </li>

                            @else
                                <li >
                                    <li >
                                        <a  href="{{ route('admin.home') }}">Dashboard</a>
                                    </li>
                                    
                                    <li >
                                        <a  href="{{ route('admin.restaurants.create') }}">Crea ristorante</a>
                                    </li>


                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                
            </nav>
        </header>
        
        <!--FINE HEADER -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
