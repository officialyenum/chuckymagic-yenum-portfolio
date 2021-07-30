<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- @trixassets --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            @yield('title')
        </title>

        <!-- Favicons -->
        <link rel="apple-touch-icon" href={{asset('img/apple-touch-icon.png')}}>
        <link rel="icon" href={{asset('img/favicon.png')}}>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        @yield('css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/page.min.css')}}" rel="stylesheet">
        <link href="{{ asset('/css/style.css')}}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <!-- Navbar -->
            {{-- <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
                <div class="container">

                    <div class="navbar-left">
                        <button class="navbar-toggler" type="button">&#9776;</button>
                    <a class="navbar-brand" href="{{route('home')}}">
                            <img class="logo-dark" src="{{asset('img/logo/yenumcomdark.png')}}" alt="logo">
                            <img class="logo-light" src="{{asset('img/logo/yenumcomlight.png')}}" alt="logo">
                        </a>
                    </div>

                    <section class="navbar-mobile">
                        <span class="navbar-divider d-mobile-none"></span>

                        <ul class="nav nav-navbar">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Application <span class="arrow"></span></a>
                            <nav class="nav">
                                <a class="nav-link" href="#">Mobile</a>
                                <div class="nav-divider"></div>
                                <a class="nav-link" href="#">Team Projects</a>
                            </nav>
                        </li>

                        </ul>
                    </section>
                    </div>
            </nav> --}}
        <!-- /.navbar -->
        <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark" data-navbar="fixed">
                <div class="container">

                <div class="navbar-left">
                    <button class="navbar-toggler" type="button">&#9776;</button>
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img class="logo-light" src="{{asset('img/logo/yenum-logo-main.png')}}" alt="logo">
                        <img class="logo-dark" src="{{asset('img/logo/yenum-logo-main.png')}}" alt="logo">
                    </a>
                </div>

                <section class="navbar-mobile">
                    <nav class="nav nav-navbar ml-auto">
                    <a class="nav-link" href="#home">Home</a>
                    <a class="nav-link" href="#about">About</a>
                    <a class="nav-link" href="#portfolio">Portfolio</a>
                    <a class="nav-link" href="#articles">Articles</a>
                    <a class="nav-link" href="#footer">GD50</a>
                    </nav>
                </section>

                </div>
            </nav><!-- /.navbar -->

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">

        <div class="col-6 col-lg-3">
            <a href="{{route('home')}}"><img class="logo-dark" src="{{asset('img/logo/yenumcomdark.png')}}" alt="logo"></a>
        </div>

        <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
            <a class="social-github" href="https://www.github.com/officialyenum"><i class="fa fa-github"></i></a>
            <a class="social-twitter" href="https://twitter.com/officialyenum"><i class="fa fa-twitter"></i></a>
            <a class="social-instagram" href="https://www.instagram.com/officialyenum/"><i class="fa fa-instagram"></i></a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
            <a class="nav-link" href="#about">About</a>
            <a class="nav-link" href="#portfolio">Portfolio</a>
            <a class="nav-link" href="#articles">Articles</a>
            <a class="nav-link" href="#">Contact</a>
            </div>
        </div>

        </div>
    </div>
    </footer><!-- /.footer -->


    @yield('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('/js/page.min.js')}}"></script>
    <script src="{{asset('/js/script.js')}}"></script>

    </body>
</html>
