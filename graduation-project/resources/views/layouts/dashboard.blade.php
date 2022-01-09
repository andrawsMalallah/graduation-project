<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Electrical Engineering Technical College') }}</title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/reset-navbar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style-navbar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/ionicon-navbar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cstm-buttons.css') }}">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


        <style>
            .header .menu>.menu-item>.sub-menu {
                border-top: 3px solid #3490dc;
            }

            .header .menu>.menu-item:hover>a {
                color: #3490dc;
            }

            .header .menu>.menu-item>.sub-menu {
                border-top: none;
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
                            <img src="{{ asset('images/logo.jpg') }}" style="height: 85px ;" class="brand">
                        </a>

                        <button type="button" class="burger-menu" id="burger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="overlay" id="overlay">
                        </div>
                        <nav class="navbar" id="navbar" style="text-decoration: none;">
                            <ul class="menu" style="height: 48px;">
                                @auth
                                <li class="menu-item menu-item-child">
                                    <a href="#" data-toggle="sub-menu">{{ Auth::user()->name }}<i
                                            class="expand"></i></a>
                                    <ul class="sub-menu shadow-lg">
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
                                <li class="menu-item"><a href="{{ route('departments') }}">Departments</a></li>
                                <li class="menu-item"><a href="{{ route('labs') }}">Labs</a></li>
                                <li class="menu-item"><a href="{{ route('teachers') }}">Teachers</a></li>
                                <li class="menu-item"><a href="{{ route('dashboard.library') }}">Library</a></li>
                                <li class="menu-item"><a href="{{ route('dashboard.blog') }}">Blog</a></li>
                                <li class="menu-item"><a href="{{ route('messages') }}">Messages</a></li>
                                <li class="menu-item"><a href="{{ route('dashboard.users') }}">Users</a></li>
                            </ul>
                        </nav>
                    </div>
                </section>
            </header>

            <main class="content container">
                @yield('content')
            </main>

        </div>
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

        <script src="/ckeditor/ckeditor.js"></script>
        <script>
            if (document.getElementById('my-editor')) {
                CKEDITOR.replace('my-editor');
            }
        </script>

        @yield('script')
    </body>

</html>