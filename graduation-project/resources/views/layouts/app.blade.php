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

        <!-- Font Awesome  -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
            crossorigin="anonymous" />
    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
                <div class="container">
                    <a class="navbar-brand text-success logo" href="{{ url('/') }}">
                        EETC
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <i class="fas fa-bars text-white"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('library') }}">Library</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    @guest
                                    <i class="fas fa-user"></i>
                                    @endguest

                                    @auth
                                    <h6 class="d-inline">{{ Auth::user()->name }}</h6>
                                    @endauth
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @guest
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        Login
                                    </a>
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        Register
                                    </a>
                                    @endguest

                                    @auth
                                    @if (Auth::user()->admin)
                                    <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @endauth
                                </div>

                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-white" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-search"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right px-2 search-input"
                                    aria-labelledby="navbarDropdown">

                                    <input class="form-control" type="search" placeholder="Search..."
                                        aria-label="Search">

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="content">
                @yield('content')
            </main>

            <footer>
                <div class="bg-dark p-2">
                    <div class="container">
                        <div class="d-flex justify-content-between">

                            <a href="#" class="navbar-brand text-success">EETC</a>
                            <a class="text-white navbar-brand">
                                &copy; All Rights Reserved | {{ date('Y') }}
                            </a>

                            <div class="social">
                                <a href="#" class="text-white navbar-brand"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="text-white navbar-brand"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="text-white navbar-brand"><i class="fab fa-linkedin"></i></a>
                            </div>

                        </div>

                        <div class="d-flex justify-content-center social-links">
                            <a href="#" class="text-white navbar-brand"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-white navbar-brand"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="text-white navbar-brand"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        @yield('script')
    </body>

</html>