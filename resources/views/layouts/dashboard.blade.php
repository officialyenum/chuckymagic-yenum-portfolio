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
        <link rel="apple-touch-icon" href={{asset('public/img/apple-touch-icon.png')}}>
        <link rel="icon" href={{asset('public/img/favicon.png')}}>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        @yield('css')
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/page.min.css')}}" rel="stylesheet">
        <link href="{{ asset('public/css/style.css')}}" rel="stylesheet">
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
                                <div class="nav-divider"></div>
                                <a class="nav-link" href="#">Team Projects</a>
                            </nav>
                        </li>

                        </ul>
                    </section>
                    </div>
            </nav> --}}
            <!-- /.navbar -->
            <!-- Start Topbar -->
            <div class="topbar">
                <!-- Start row -->
                <div class="row align-items-center">
                    <!-- Start col -->
                    <div class="col-md-12 align-self-center">
                        <div class="togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                            <i class="ri-close-line menu-hamburger-close"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="searchbar">
                                        <form>
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn" type="submit" id="button-addon2"><i class="ri-search-2-line"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="infobar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="settingbar">
                                        <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon"><i class="ri-settings-line"></i></a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="notifybar">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ri-notification-line"></i>
                                            <span class="live-icon"></span></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                                                <div class="notification-dropdown-title">
                                                    <h5>Notifications<a href="#">Clear all</a></h5>
                                                </div>
                                                <ul class="list-unstyled">
                                                    <li class="media dropdown-item">
                                                        <span class="action-icon badge badge-primary"><i class="ri-bank-card-2-line"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title">Payment Success !!!</h5>
                                                            <p><span class="timing">Today, 09:05 AM</span></p>
                                                        </div>
                                                    </li>
                                                    <li class="media dropdown-item">
                                                        <span class="action-icon badge badge-success"><i class="ri-file-user-line"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title">Riva applied for job</h5>
                                                            <p><span class="timing">Yesterday, 02:30 PM</span></p>
                                                        </div>
                                                    </li>
                                                    <li class="media dropdown-item">
                                                        <span class="action-icon badge badge-secondary"><i class="ri-pencil-line"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title">Maria requested to leave</h5>
                                                            <p><span class="timing">5 June 2020, 12:10 PM</span></p>
                                                        </div>
                                                    </li>
                                                    <li class="media dropdown-item">
                                                        <span class="action-icon badge badge-warning"><i class="ri-shopping-cart-line"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title">New order placed</h5>
                                                            <p><span class="timing">1 Jun 2020, 04:40 PM</span></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="notification-dropdown-footer">
                                                    <h5><a href="#">See all</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="languagebar">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag flag-icon-us flag-icon-squared"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink">
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-us flag-icon-squared"></i>English</a>
                                                {{-- <a class="dropdown-item" href="#"><i class="flag flag-icon-de flag-icon-squared"></i>German</a>
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-bl flag-icon-squared"></i>France</a>
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-ru flag-icon-squared"></i>Russian</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End Topbar -->
        <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark" data-navbar="fixed">
                <div class="container">

                <div class="navbar-left">
                    <button class="navbar-toggler" type="button">&#9776;</button>
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img class="logo-light" src="{{asset('public/img/logo/yenum-logo-main.png')}}" alt="logo">
                        <img class="logo-dark" src="{{asset('public/img/logo/yenum-logo-main.png')}}" alt="logo">
                    </a>
                </div>

                <section class="navbar-mobile">
                    <nav class="nav nav-navbar ml-auto">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                        <a class="nav-link" href="#about">About</a>
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                        <a class="nav-link" href="#articles">Articles</a>
                        <a class="nav-link" href="https://github.com/officialyenum/GD50" target="_blank">GD50</a>
                    </nav>
                    @auth
                        {{-- <a class="btn btn-round btn-primary mw-200" href="#">Sign up — Free</a> --}}
                        {{-- <a class="nav-link btn btn-round btn-xs btn-light mw-100 mx-2" href="{{ route('admin.index')}}"><small> {{ Auth::user()->username }}'s Dashboard</small></a> --}}
                    @else
                        {{-- <a class="nav-link btn btn-round btn-xs btn-light mw-100 mx-2" href="{{ route('login') }}">Login</a> --}}
                        {{-- <a class="nav-link btn btn-round btn-xs btn-success mw-100 mx-2" href="{{ route('register') }}">Register</a> --}}
                    @endauth
                </section>

                </div>
            </nav><!-- /.navbar -->

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">

        <div class="col-6 col-lg-3">
            <a href="{{route('home')}}"><img class="logo-dark" src="{{asset('public/img/logo/yenumcomdark.png')}}" alt="logo"></a>
        </div>

        <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
            <a class="social-github" href="https://www.github.com/officialyenum" target="_blank"><i class="fa fa-github"></i></a>
            <a class="social-twitter" href="https://twitter.com/officialyenum" target="_blank"><i class="fa fa-twitter"></i></a>
            <a class="social-instagram" href="https://www.instagram.com/officialyenum/" target="_blank"><i class="fa fa-instagram"></i></a>
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
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{asset('public/js/page.min.js')}}"></script>
    <script src="{{asset('public/js/script.js')}}"></script>

    </body>
</html>
