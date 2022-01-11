@php
$departments = App\Models\Department::where('type', 'scientific')->orderBy('name', 'ASC')->get(['id', 'name']);
$units = App\Models\Department::where('type', 'management')->orderBy('name', 'ASC')->get(['id', 'name']);
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Electrical Engineering Technical College') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/reset-navbar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style-navbar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/ionicon-navbar.min.css') }}">

        <!-- Font Awesome  -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
            crossorigin="anonymous" />

        @yield('links')

        <style>
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
                        <nav class="navbar" id="navbar">
                            <ul class="menu"
                                style='height: 48px; font-family: "Segoe UI",Tahoma,Geneva,Verdana,sans-serif;'>

                                <li class="menu-item menu-item-child">
                                    <a style="text-decoration: none;" href="#" data-toggle="sub-menu">Scientific
                                        Departments<i class="expand"></i></a>
                                    <ul class="sub-menu shadow-lg">
                                        @foreach ($departments as $department)
                                        <li class="menu-item"><a
                                                href="{{ route('department.show', $department->name) }}">{{
                                                $department->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-child">
                                    <a style="text-decoration: none;" href="#" data-toggle="sub-menu">Centers & Units<i
                                            class="expand"></i></a>
                                    <ul class="sub-menu shadow-lg">
                                        @foreach ($units as $unit)
                                        <li class="menu-item"><a href="{{ route('department.show', $unit->name) }}">{{
                                                $unit->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item"><a href="{{ route('blog') }}">Blog</a></li>
                                <li class="menu-item"><a href="{{ route('about') }}">About</a></li>
                                <li class="menu-item"><a href="{{ route('contact') }}">Contact Us</a></li>

                                <li class="menu-item menu-item-child">
                                    <a href="#" data-toggle="sub-menu">
                                        <svg class="ml-1" width="16" height="18" fill="currentColor">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />

                                        </svg>
                                    </a>
                                    <ul class="sub-menu shadow-lg">
                                        <li class="menu-item px-3">
                                            <form action="{{ route('search') }}" method="GET">
                                                <input type="text" name="term" class="form-control my-2"
                                                    placeholder="Search..." required autocomplete="off">

                                                @error('term')
                                                <span class="pl-1 text-danger">{{ $message }}</span>
                                                @enderror
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @auth
                                <li class="menu-item menu-item-child">
                                    <a href="#" data-toggle="sub-menu">{{ Auth::user()->name }}<i
                                            class="expand"></i></a>
                                    <ul class="sub-menu shadow-lg">
                                        @if (Auth::user()->admin || Auth::user()->blogger)
                                        <li class="menu-item">
                                            <a href="#" data-toggle="modal" data-target="#Modal">Create new post</a>
                                        </li>
                                        @endif

                                        @if(Auth::user()->admin)
                                        <li class="menu-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        @endif

                                        <li class="menu-item"><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">Logout</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @endauth
                            </ul>
                        </nav>
                    </div>
                </section>
            </header>

            <main class="content">
                @yield('content')
            </main>

            <footer class="shadow-lg">
                <div class="bg-white p-3">
                    <div class="container">
                        <div class="d-flex justify-content-between align-items-baseline">

                            <a href="/" class=" text-decoration-none">
                                <h4 class="footer-logo">EETC</h4>
                            </a>
                            <h5 class="text-dark ">
                                &copy; All Rights Reserved | {{ date('Y') }}
                            </h5>

                            <div class="social">
                                <a href="https://www.facebook.com/eetc.edu.iq" target="_blank" class="text-dark pr-2"><i
                                        class="fab fa-facebook"></i></a>
                                <a href="https://www.youtube.com/channel/UCqzrjmOsxHEPrpbyLO1UJgA" target="_blank"
                                    class="text-dark pr-2"><i class="fab fa-youtube"></i></a>
                                <a href="https://www.linkedin.com/company/electrical-engineering-technical-college/?viewAsMember=true"
                                    target="_blank" class="text-dark"><i class="fab fa-linkedin"></i></a>
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

        <!-- Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Create New Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <input class="form-control mx-3" name="title" required placeholder="Post Title" />
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" required name="image" class="custom-file-input"
                                        id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label text-md-right">Description</label>
                                <div class="">
                                    <textarea class="form-control" required rows="3" name="description"
                                        id="my-editor"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="/ckeditor/ckeditor.js"></script>
        <script>
            if (document.getElementById('my-editor')) {
                CKEDITOR.replace('my-editor');
            }
        </script>

        @yield('script')
    </body>

</html>