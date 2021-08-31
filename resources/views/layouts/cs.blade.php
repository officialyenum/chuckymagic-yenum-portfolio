<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @trixassets
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        @yield('css')
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/page.min.css')}}" rel="stylesheet">
        <link href="{{ asset('public/css/style.css')}}" rel="stylesheet">

    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
            <div class="container">

            <div class="navbar-left">
                <button class="navbar-toggler" type="button">&#9776;</button>
                <a class="navbar-brand" href="{{route('dashboard')}}">
                    <img class="logo-dark" src="{{asset('public/img/logo/yenumcomdark.png')}}" alt="logo">
                    <img class="logo-light" src="{{asset('public/img/logo/yenumcomlight.png')}}" alt="logo">
                </a>
            </div>

            <section class="navbar-mobile">
                <span class="navbar-divider d-mobile-none"></span>

                <ul class="nav nav-navbar">
                <li class="nav-item">
                    <a class="nav-link" href="#">Application <span class="arrow"></span></a>
                    <nav class="nav">
                        <a class="nav-link" href="#">Mobile</a>
                        <a class="nav-link" href="#">Web</a>
                        <a class="nav-link" href="#">Game</span></a>
                        <a class="nav-link" href="{{ route('games.index')}}">Web Game</span></a>
                        <div class="nav-divider"></div>
                        <a class="nav-link" href="#">Team Projects</a>
                        <a class="nav-link" href="#">How I Built it</a>
                    </nav>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Photography <span class="arrow"></span></a>
                    <nav class="nav">
                        <a class="nav-link" href="#">Portrait</a>
                        <a class="nav-link" href="#">Photo Manipulation</a>
                        <a class="nav-link" href="#">Photo Retouch</a>
                        <div class="nav-divider"></div>
                        <a class="nav-link" href="#">How I Shot it</a>
                        <a class="nav-link" href="#">How I Edited it</a>
                    </nav>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#">Video <span class="arrow"></span></a>
                    <nav class="nav">
                    <a class="nav-link" href="#">Edit</a>
                    <a class="nav-link" href="#">Vfx Edit</a>
                    <a class="nav-link" href="#">Abstract</a>
                    <div class="nav-divider"></div>
                    <a class="nav-link" href="#">How i Shot it</a>
                    <a class="nav-link" href="#">How i Edited it</a>
                    </nav>
                </li>

                </ul>
            </section>

            <a class="btn btn-xs btn-round btn-success" href="{{route('games.index')}}">Play Now</a>

            </div>
        </nav><!-- /.navbar -->

        <!-- Header
        <header class="header text-white" style="background-image: url({{asset('public/img/bg/gameBg.jpg')}})" data-overlay="5">
            <div class="container text-center">

            <div class="row">
                <div class="col-lg-8 mx-auto">

                <a class="btn btn-lg btn-round btn-white" href="{{route('games.index')}}">GAME AREA</a>

                </div>
            </div>

            </div>
        </header> /.header -->

        <div id="app">
            <main class="main-content overflow-auto" style="background-image: url({{asset('public/img/bg/gameCanvas.jpg')}});background-repeat: no-repeat;background-size: cover;height: 150px;">
                    @yield('content')
            </main>
        </div>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
        <!-- Popper -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <!-- Scripts -->
        <script src="{{ asset('public/js/app.js') }}"></script>
        <script src="{{asset('public/js/script.js')}}"></script>
        @yield('scripts')
    </body>
</html>
