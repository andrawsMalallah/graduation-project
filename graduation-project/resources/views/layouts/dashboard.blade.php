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
        <script src="{{ asset('js/dashboard.js') }}" defer></script>

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

    <body class="body">
        <div id="app">
            <nav class="position-fixed fixed-top navbar navbar-expand-md navbar-light bg-dark shadow-sm">
                <div class="d-flex justify-content-between w-100" style="padding-left: 32px">
                    <div class="d-flex align-items-baseline">
                        <a id="sidebarToggle" class="text-white pr-3 pt-2 toggle" href="#"><i
                                class="fa fa-bars"></i></a>
                        <a class="navbar-brand text-success" style="font-size: 1.5rem" href="/">EETC</a>
                    </div>

                    <ul class="navbar-nav ml-auto" style="padding-right: 32px; padding-top: 7px">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    </ul>
                </div>
            </nav>

            <div class="sidebar active bg-dark text-white p-5 shadow-sm">
                <div id="sideNavigation" class="active">
                    <h3>
                        <a href="{{ route('dashboard') }}" class="text-white text-decoration-none">Dashboard</a>
                    </h3>
                    <hr class="bg-white">

                    <div class="links pt-3">
                        <ul class="list-unstyled">
                            <li>
                                <a title="Sliders" class="text-white d-block pb-3"
                                    href="{{ route('sliders') }}">
                                    <i class="far fa-images pr-2"></i>Sliders
                                </a>
                            </li>
                            <li>
                                <a title="Departments" class="text-white d-block pb-3"
                                    href="{{ route('departments') }}">
                                    <i class="fas fa-building pr-2"></i>Departments
                                </a>
                            </li>
                            <li>
                                <a title="Departments" class="text-white d-block pb-3" href="{{ route('labs') }}">
                                    <i class="fad fa-users-class pr-2"></i>Labs
                                </a>
                            </li>
                            <li>
                                <a title="Teachers" class="text-white d-block pb-3" href="{{ route('teachers') }}">
                                    <i class="fad fa-chalkboard-teacher pr-2"></i>Teachers
                                </a>
                            </li>

                            <li>
                                <a title="Library" class="text-white d-block pb-3"
                                    href="{{ route('dashboard.library') }}"><i class="fas fa-book-open pr-2"></i>Library
                                </a>
                            </li>

                            <li>
                                <a title="Blog" class="text-white d-block pb-3" href="{{ route('dashboard.blog') }}"><i
                                        class="fas fa-blog pr-2"></i>Blog
                                </a>
                            </li>
                            <li>
                                <a title="Users" class="text-white d-block pb-3"
                                    href="{{ route('dashboard.users') }}"><i class="fa fa-users pr-2"></i>Users
                                </a>
                            </li>
                        </ul>




                    </div>
                </div>


                <div class="narrow-side-navigation d-flex flex-column justify-content-center align-items-center h-100"
                    id="narrowNav">

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a title="Sliders" class="text-white pb-3 mx-auto" href="{{ route('sliders') }}">
                                <i class="far fa-images fa-2x pr-2"></i>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a title="Departments" class="text-white pb-3 mx-auto" href="{{ route('departments') }}"><i
                                    class="fas fa-building fa-2x pr-2"></i></a>
                        </li>
                        <li class="mb-2">
                            <a title="Labs" class="text-white pb-3 mx-auto" href="{{ route('labs') }}"><i
                                    class="fad fa-users-class fa-2x pr-2"></i></a>
                        </li>
                        <li class="mb-2">
                            <a title="Labs" class="text-white pb-3 mx-auto" href="{{ route('teachers') }}"><i
                                    class="fad fa-chalkboard-teacher fa-2x pr-2"></i></a>
                        </li>
                        <li class="mb-2">
                            <a title="Library" class="text-white pb-3 mx-auto"
                                href="{{ route('dashboard.library') }}"><i class="fas fa-book-open fa-2x pr-2"></i></a>
                        </li>
                        <li class="mb-2">
                            <a title="Blog" class="text-white fa-2x pb-3 mx-auto"
                                href="{{ route('dashboard.blog') }}"><i class="fas fa-blog pr-2 blog-icon"></i></a>
                        </li>
                        <li class="mb-2">
                            <a title="Users" class="text-white pb-3 mx-auto" href="{{ route('dashboard.users') }}"><i
                                    class="fa fa-users fa-2x pr-2"></i></a>
                        </li>
                    </ul>


                </div>
            </div>

            <main class="main-content" id="mainContent">
                @yield('content')
            </main>

        </div>

        @yield('script')
    </body>

</html>