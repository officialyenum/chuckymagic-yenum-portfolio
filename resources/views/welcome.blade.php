<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yenum.dev</title>

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
        <link rel="icon" href="../assets/img/favicon.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
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
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
        <div class="container">

            <div class="navbar-left">
                <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="{{route('welcome')}}">
                    <img class="logo-dark" src="{{asset('img/logo/yenumcomdark.png')}}" alt="logo">
                    <img class="logo-light" src="{{asset('img/logo/yenumcomlight.png')}}" alt="logo">
                </a>
            </div>

            <section class="navbar-mobile">
                <span class="navbar-divider d-mobile-none"></span>

                <ul class="nav nav-navbar">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Programming <span class="arrow"></span></a>
                        <nav class="nav">
                            <a class="nav-link" href="#">Mobile</a>
                            <a class="nav-link" href="#">Web</a>
                            <a class="nav-link" href="#">Game</a>
                            <a class="nav-link" href="#">DIY</a>
                        </nav>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Writer's Corner <span class="arrow"></span></a>
                        <nav class="nav">
                            <a class="nav-link" href="#">Top</a>
                            <a class="nav-link" href="#">Recommended</a>
                        </nav>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="#">Projects <span class="arrow"></span></a>
                        <nav class="nav">
                            <a class="nav-link" href="#">Edit</a>
                        </nav>
                    </li>

                </ul>
            </section>

            <a class="btn btn-xs btn-round btn-success" href="{{ route('games.index')}}">Play Now</a>

        </div>
    </nav><!-- /.navbar -->


        <!-- Header -->
        <header class="header text-white" style="background-image: url({{asset('img/bg/officialyenum.jpg')}})" data-overlay="8">
            <div class="container text-center">

                <div class="row">
                    <div class="col-lg-8 mx-auto">

                    <h1>Yenum is <span class="text-primary" data-typing="A Developer, A Photograper , An Editor, A Vibe!!!"></span></h1>
                    <p class="lead-2 mt-5">“Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live”</p>
                    <P> -- JOHN WOODS -- </P>
                    <hr class="w-60px my-7">

                    <a class="btn btn-lg btn-round btn-white" href="#">Explore my Projects</a>

                    </div>
                </div>

            </div>
        </header><!-- /.header -->


        <!-- Main Content -->
        <main class="main-content">



        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Portfolio
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
            <section class="section overflow-hidden">
                <div class="container">

                    <div data-provide="shuffle">
                    <ul class="nav nav-center nav-bold nav-uppercase nav-slash mb-7" data-shuffle="filter">
                        <li class="nav-item">
                        <a class="nav-link active" href="#" data-shuffle="button">All</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#" data-shuffle="button" data-group="applications">Applications</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#" data-shuffle="button" data-group="photographs">Photographs</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#" data-shuffle="button" data-group="videos">Videos</a>
                        </li>
                    </ul>


                    <div class="row gap-y gap-2" data-shuffle="list">

                        <div class="col-6 col-lg-3" data-shuffle="item" data-groups="applications,videos">
                        <a class="portfolio-1" href="portfolio-single.html">
                            <img src="{{asset('img/projects/awc-logo.jpg')}}" alt="screenshot">
                            <div class="portfolio-detail">
                            <h5>Afterwork Chills Website</h5>
                            <p>Applications,Videos</p>
                            </div>
                        </a>
                        </div>


                        <div class="col-6 col-lg-3" data-shuffle="item" data-groups="photographs">
                        <a class="portfolio-1" href="portfolio-single.html">
                            <img src="{{asset('img/bg/chuckymagic.jpg')}}" alt="screenshot">
                            <div class="portfolio-detail">
                            <h5>Ligthning God Look Edit</h5>
                            <p>Photographs</p>
                            </div>
                        </a>
                        </div>


                        <div class="col-6 col-lg-3" data-shuffle="item" data-groups="photographs">
                        <a class="portfolio-1" href="portfolio-single.html">
                            <img src="{{asset('img/categories/photography.jpeg')}}" alt="screenshot">
                            <div class="portfolio-detail">
                            <h5>T-shirt</h5>
                            <p>Photographs</p>
                            </div>
                        </a>
                        </div>


                        <div class="col-6 col-lg-3" data-shuffle="item" data-groups="photographs">
                        <a class="portfolio-1" href="portfolio-single.html">
                            <img src="{{asset('img/categories/photography.jpeg')}}" alt="screenshot">
                            <div class="portfolio-detail">
                            <h5>Coffee</h5>
                            <p>Photographs</p>
                            </div>
                        </a>
                        </div>


                        <div class="col-6 col-lg-3" data-shuffle="item" data-groups="applications">
                        <a class="portfolio-1" href="portfolio-single.html">
                            <img src="{{asset('img/categories/game.jpeg')}}" alt="screenshot">
                            <div class="portfolio-detail">
                            <h5>Magic Switch</h5>
                            <p>Application</p>
                            </div>
                        </a>
                        </div>


                        <div class="col-6 col-lg-3" data-shuffle="item" data-groups="videos">
                        <a class="portfolio-1" href="portfolio-single.html">
                            <img src="{{asset('img/categories/videoedit.jpeg')}}" alt="screenshot">
                            <div class="portfolio-detail">
                            <h5>Visual is The Future</h5>
                            <p>Video</p>
                            </div>
                        </a>
                        </div>


                        <div class="col-6 col-lg-3" data-shuffle="item" data-groups="application">
                        <a class="portfolio-1" href="#">
                            <img src="{{asset('img/categories/game-2.jpeg')}}" alt="screenshot">
                            <div class="portfolio-detail">
                            <h5>Elixir Platformer Game</h5>
                            <p>Application</p>
                            </div>
                        </a>
                        </div>


                        <div class="col-6 col-lg-3" data-shuffle="item" data-groups="applications">
                        <a class="portfolio-1" href="#">
                            <img src="{{asset('img/categories/code.jpeg')}}" alt="screenshot">
                            <div class="portfolio-detail">
                            <h5>Magazine</h5>
                            <p>Applications</p>
                            </div>
                        </a>
                        </div>

                    </div>
                    </div>


                </div>
            </section>



        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Get a Quote
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <section class="section bg-gray text-center">

          <h2 class="mb-6">Get a Quote</h2>
          <p class="lead text-muted">We’ve completed more than 100+ project for our amazing clients, if you interested?</p>
          <hr class="w-50px">
          <a class="btn btn-lg btn-round btn-success" href="#">Design your site now</a>

        </section>


      </main><!-- /.main-content -->


      <!-- Footer -->
      <footer class="footer">
        <div class="container">
          <div class="row gap-y align-items-center">

            <div class="col-6 col-lg-3">
                <a href="{{route('home')}}"><img class="logo-dark" src="{{asset('img/logo/yenumcomdark.png')}}" alt="logo"></a>
            </div>

            <div class="col-6 col-lg-3 text-right order-lg-last">
              <div class="social">
                <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
                <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
                <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
                <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                <a class="nav-link" href="#">About</a>
                <a class="nav-link" href="#">Articles</a>
                <a class="nav-link" href="#">Contact</a>
              </div>
            </div>

          </div>
        </div>
      </footer><!-- /.footer -->


    <
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('/js/page.min.js')}}"></script>
    <script src="{{asset('/js/script.js')}}"></script>

    </body>
</html>
