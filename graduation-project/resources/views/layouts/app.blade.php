<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EETC') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/reset-navbar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style-navbar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/ionicon-navbar.min.css') }}">

        <!-- Font Awesome  -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
            crossorigin="anonymous" />

            {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
                         alpha/css/bootstrap.css" rel="stylesheet"> --}}
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <style>
            .header .menu>.menu-item>.sub-menu {
                border-top: 3px solid #3490dc;
            }

            .header .menu>.menu-item:hover>a {
                color: #3490dc;
            }

            :root {

                --color-pink: #3490dc;
            }
        </style>
    </head>

    <body>
        <div id="app">

            <!-- Section: Header -->
            <header class="header">
                <section class="container">
                    <div class="wrapper" style="height: 89px">
                        <a href="/">
                            <img src="{{ asset('images/logo-edited.jpg') }}" style="height: 85px ;" class="brand">
                        </a>
                        <!-- <li class="menu-item" ><a href="#">Home</a></li> -->

                        <button type="button" class="burger-menu" id="burger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="overlay" id="overlay">
                        </div>
                        <nav class="navbar" id="navbar">
                            <ul class="menu" style="height: 48px;">
                                @guest
                                <li class="menu-item menu-item-child">
                                    <a href="#" data-toggle="sub-menu">Join<i class="expand"></i></a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="{{ route('login') }}">Login</a></li>
                                        <li class="menu-item"><a href="{{ route('register') }}">Register</a></li>
                                    </ul>
                                </li>
                                @endguest
                                @auth
                                <li class="menu-item menu-item-child">
                                    <a href="#" data-toggle="sub-menu">{{ Auth::user()->name }}<i
                                            class="expand"></i></a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        @if(Auth::user()->admin)
                                        <li class="menu-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        @endif
                                    </ul>
                                </li>
                                @endauth
                                <li class="menu-item menu-item-child">
                                    <a href="#" data-toggle="sub-menu">Scientific Departments<i class="expand"></i></a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="#">Computer Technology Engineering</a></li>
                                        <li class="menu-item"><a href="#">Medical Instrumentation Engineering
                                                Techniques</a></li>
                                        <li class="menu-item"><a href="#">Electrical Power Technologies Engineering</a>
                                        </li>
                                        <li class="menu-item"><a href="#">Control And Automation Technologies
                                                Engineering</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item"><a href="{{ route('blog') }}">Blog</a></li>
                                <li class="menu-item"><a href="{{ route('about') }}">About</a></li>
                                <li class="menu-item"><a href="{{ route('contact') }}">Contact Us</a></li>
                                
                                <li class="menu-item menu-item-child">
                                    <a href="#" data-toggle="sub-menu">Search</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item">
                                            <form action="">
                                                <input type="text" name="search" class="form-control my-2 mx-auto" placeholder="Search..." style="width: 195px">
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </section>
            </header>

            <main class="content">
                @yield('content')
            </main>

            <footer class="shadow-lg">
                <div class="bg-white p-2">
                    <div class="container">
                        <div class="d-flex justify-content-between">

                            <a href="/" class="navbar-brand text-primary font-weight-bold">EETC</a>
                            <a class="text-dark navbar-brand">
                                &copy; All Rights Reserved | {{ date('Y') }}
                            </a>

                            <div class="social">
                                <a href="#" class="text-dark navbar-brand"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="text-dark navbar-brand"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="text-dark navbar-brand"><i class="fab fa-linkedin"></i></a>
                            </div>

                        </div>

                        <div class="d-flex justify-content-center social-links">
                            <a href="#" class="text-dark navbar-brand"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-dark navbar-brand"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="text-dark navbar-brand"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script defer src="{{ asset('js/script-navbar.js') }}"></script>
        <script>
            @if(Session::has('message'))
                  toastr.options =
                  {
                  	"closeButton" : true,
                  }
                  		toastr.success("{{ session('message') }}");
                  @endif
                
                  @if(Session::has('error'))
                  toastr.options =
                  {
                  	"closeButton" : true,
                  }
                  		toastr.error("{{ session('error') }}");
                  @endif
                
                  @if(Session::has('info'))
                  toastr.options =
                  {
                  	"closeButton" : true,
                  }
                  		toastr.info("{{ session('info') }}");
                  @endif
                
                  @if(Session::has('warning'))
                  toastr.options =
                  {
                  	"closeButton" : true,
                  }
                  		toastr.warning("{{ session('warning') }}");
                  @endif
        </script>
        @yield('script')
    </body>

</html>