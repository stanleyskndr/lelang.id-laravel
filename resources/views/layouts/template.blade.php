<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('jquery.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    {{-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,300;1,400&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('storage/res/lelangid_logo4.png')}}">
    @yield('title')
</head>

<body>
    <div class="nav-bar">
        <a class="navbar-logo" href="{{ route('home') }}">
            <img src="../storage/res/lelangid_logo2.png" alt="">
        </a>

        <div class="search-bar">
            <form method="GET" action="">
                <input type="text" name="search_input" placeholder="Search for item or brand name..">
                <button type="submit">
                    <img src="../storage/res/search-icon-yellow.png" alt="">
                </button>
            </form>
        </div>

        <div class="nav-menu">
            <li class="nav-item dropdown-menu">
                <a href="#" role="button" >
                    <div class="nav-username">
                        <p>Category</p> 
                    </div>
                    <div class="dropdown-icon">
                        <img src="../storage/res/down-arrow-yellow.png" alt="">
                    </div>
                </a>
        
                <div class="dropdown-item ">
                    <a href="">
                        <p>Sneakers</p>
                        <p>Electronics</p>
                        <p>Bicycle</p>
                        <p>Watch</p>
                        <p>Fashion Acc.</p>
                        <p>Branded Apparel</p>
                    </a>
                </div>
            </li>
            @guest
                @yield('nav-menu-guest')
            @else
                @if (Auth::user()->role == 0)
                    @yield('nav-menu-user')
                @else
                    @yield('nav-menu-admin')

                @endif
                <li class="nav-item dropdown-menu">
                    <a href="#" role="button" >
                        <div class="nav-profile-pic">
                            <img src="/storage/res/profile-pic.png" alt="">
                        </div>
                        <div class="nav-username">
                            {{ Auth::user()->username }}
                        </div>
                        <div class="dropdown-icon">
                            <img src="../storage/res/down-arrow-yellow.png" alt="">
                        </div>
                    </a>

                    <div class="dropdown-item ">
                        <a  href="{{ route('logout') }}"
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
        </div>   
    </div>

    <main class="content">
        @yield('content')
    </main>
</body>
</html>