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
            <a class="navbar-brand" href="../index.html">
              <img class="logo-dark" src="../assets/img/logo-dark.png" alt="logo">
              <img class="logo-light" src="../assets/img/logo-light.png" alt="logo">
            </a>
          </div>

          <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar">
              <li class="nav-item">
                <a class="nav-link" href="#">Main <span class="arrow"></span></a>
                <ul class="nav">

                  <li class="nav-item">
                    <a class="nav-link" href="#">Projects <span class="arrow"></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Tools<span class="arrow"></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Projects <span class="arrow"></span></a>
                  </li>

                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Pages <span class="arrow"></span></a>
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link" href="../page/how-it-works.html">How it works</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="../page/pricing.html">Pricing</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio <span class="arrow"></span></a>
                    <nav class="nav">
                      <a class="nav-link" href="../page/portfolio.html">Potfolio listing</a>
                      <a class="nav-link" href="../page/portfolio-single.html">Potfolio single</a>
                    </nav>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">Careers <span class="arrow"></span></a>
                    <nav class="nav">
                      <a class="nav-link" href="../page/career.html">Careers listing</a>
                      <a class="nav-link" href="../page/career-single.html">Careers single</a>
                    </nav>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">Service <span class="arrow"></span></a>
                    <nav class="nav">
                      <a class="nav-link" href="../page/service-1.html">Service 1</a>
                      <a class="nav-link" href="../page/service-2.html">Service 2</a>
                    </nav>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">About <span class="arrow"></span></a>
                    <nav class="nav">
                      <a class="nav-link" href="../page/about-1.html">About 1</a>
                      <a class="nav-link" href="../page/about-2.html">About 2</a>
                      <a class="nav-link" href="../page/about-3.html">About 3</a>
                    </nav>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact <span class="arrow"></span></a>
                    <nav class="nav">
                      <a class="nav-link" href="../page/contact-1.html">Contact 1</a>
                      <a class="nav-link" href="../page/contact-2.html">Contact 2</a>
                      <a class="nav-link" href="../page/contact-3.html">Contact 3</a>
                    </nav>
                  </li>

                  <li class="nav-divider"></li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">Extra <span class="arrow"></span></a>
                    <nav class="nav">
                      <a class="nav-link" href="../page/demo.html">Request demo</a>
                      <a class="nav-link" href="../page/coming-soon.html">Coming soon</a>
                      <a class="nav-link" href="../page/terms.html">Terms</a>
                      <a class="nav-link" href="../page/error-404.html">Error 404</a>
                    </nav>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">User <span class="arrow"></span></a>
                    <nav class="nav">
                      <a class="nav-link" href="../page/user-login.html">Login</a>
                      <a class="nav-link" href="../page/user-register.html">Register</a>
                      <a class="nav-link" href="../page/user-recover.html">Recover</a>
                    </nav>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#">Docs <span class="arrow"></span></a>
                    <nav class="nav">
                      <a class="nav-link" href="../docs/index.html">Support center</a>
                      <a class="nav-link" href="../docs/articles.html">Articles</a>
                      <a class="nav-link" href="../docs/faq.html">FAQ</a>
                    </nav>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="#">Blog <span class="arrow"></span></a>
                <nav class="nav">
                  <a class="nav-link" href="../blog/classic.html">Classic</a>
                  <a class="nav-link active" href="../blog/grid.html">Grid</a>
                  <a class="nav-link" href="../blog/list.html">List</a>
                  <a class="nav-link" href="../blog/sidebar.html">Sidebar</a>
                  <div class="nav-divider"></div>
                  <a class="nav-link" href="../blog/post-1.html">Post 1</a>
                  <a class="nav-link" href="../blog/post-2.html">Post 2</a>
                </nav>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Shop <span class="arrow"></span></a>
                <nav class="nav">
                  <a class="nav-link" href="../shop/list.html">List</a>
                  <a class="nav-link" href="../shop/item.html">Item</a>
                  <a class="nav-link" href="../shop/cart.html">Cart</a>
                  <a class="nav-link" href="../shop/checkout.html">Checkout</a>
                </nav>
              </li>

              <li class="nav-item nav-mega">
                <a class="nav-link" href="#">Blocks <span class="arrow"></span></a>
                <nav class="nav px-lg-2 py-lg-4">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg">
                        <nav class="nav flex-column">
                          <a class="nav-link" href="../block/blog.html">Blog</a>
                          <a class="nav-link" href="../block/career.html">Career</a>
                          <a class="nav-link" href="../block/contact.html">Contact</a>
                          <a class="nav-link" href="../block/content.html">Content</a>
                          <a class="nav-link" href="../block/counter.html">Counter</a>
                          <a class="nav-link" href="../block/cover.html">Cover</a>
                          <a class="nav-link" href="../block/cta.html">Call to action</a>
                          <a class="nav-link" href="../block/download.html">Download</a>
                          <a class="nav-link" href="../block/explore.html">Explore</a>
                          <a class="nav-link" href="../block/faq.html">FAQ</a>
                        </nav>
                      </div>
                    </div>
                  </div>
                </nav>
              </li>

            </ul>
          </section>

          <a class="btn btn-xs btn-round btn-success" href="#">Buy Now</a>

        </div>
      </nav><!-- /.navbar -->


      <!-- Header -->
      <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
        <div class="container">

          <div class="row">
            <div class="col-md-8 mx-auto">

              <h1>Latest Blog Posts</h1>
              <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

            </div>
          </div>

        </div>
      </header><!-- /.header -->


      <!-- Main Content -->
      <main class="main-content">

        <section class="section bg-gray">
          <div class="container">

            <div class="row gap-y">

              <div class="col-md-6 col-lg-4">
                <div class="card d-block border hover-shadow-6 mb-6">
                  <a href="#"><img class="card-img-top" src="../assets/img/thumb/1.jpg" alt="Card image cap"></a>
                  <div class="p-6 text-center">
                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">News</a></p>
                    <h5 class="mb-0"><a class="text-dark" href="#">We relocated our office to a new designed garage</a></h5>
                  </div>
                </div>
              </div>


              <div class="col-md-6 col-lg-4">
                <div class="card d-block border hover-shadow-6 mb-6">
                  <a href="#"><img class="card-img-top" src="../assets/img/thumb/2.jpg" alt="Card image cap"></a>
                  <div class="p-6 text-center">
                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Marketing</a></p>
                    <h5 class="mb-0"><a class="text-dark" href="#">Top 5 brilliant content marketing strategies</a></h5>
                  </div>
                </div>
              </div>


              <div class="col-md-6 col-lg-4">
                <div class="card d-block border hover-shadow-6 mb-6">
                  <a href="#"><img class="card-img-top" src="../assets/img/thumb/3.jpg" alt="Card image cap"></a>
                  <div class="p-6 text-center">
                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Design</a></p>
                    <h5 class="mb-0"><a class="text-dark" href="#">Best practices for minimalist design with example</a></h5>
                  </div>
                </div>
              </div>


              <div class="col-md-6 col-lg-4">
                <div class="card d-block border hover-shadow-6 mb-6">
                  <a href="#"><img class="card-img-top" src="../assets/img/thumb/4.jpg" alt="Card image cap"></a>
                  <div class="p-6 text-center">
                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Hiring</a></p>
                    <h5 class="mb-0"><a class="text-dark" href="#">Congratulate and thank to Maryam for joining our team</a></h5>
                  </div>
                </div>
              </div>


              <div class="col-md-6 col-lg-4">
                <div class="card d-block border hover-shadow-6 mb-6">
                  <a href="#"><img class="card-img-top" src="../assets/img/thumb/5.jpg" alt="Card image cap"></a>
                  <div class="p-6 text-center">
                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Product</a></p>
                    <h5 class="mb-0"><a class="text-dark" href="#">New published books to read by a product designer</a></h5>
                  </div>
                </div>
              </div>


              <div class="col-md-6 col-lg-4">
                <div class="card d-block border hover-shadow-6 mb-6">
                  <a href="#"><img class="card-img-top" src="../assets/img/thumb/6.jpg" alt="Card image cap"></a>
                  <div class="p-6 text-center">
                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Management</a></p>
                    <h5 class="mb-0"><a class="text-dark" href="#">This is why it's time to ditch dress codes at work</a></h5>
                  </div>
                </div>
              </div>

            </div>


            <nav class="flexbox mt-6">
              <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-2"></i> Newer</a>
              <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-2"></i></a>
            </nav>

          </div>
        </section>

      </main>


      <!-- Footer -->
      <footer class="footer">
        <div class="container">
          <div class="row gap-y align-items-center">

            <div class="col-6 col-lg-3">
              <a href="../index.html"><img src="../assets/img/logo-dark.png" alt="logo"></a>
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
                <a class="nav-link" href="../uikit/index.html">Elements</a>
                <a class="nav-link" href="../block/index.html">Blocks</a>
                <a class="nav-link" href="../page/about-1.html">About</a>
                <a class="nav-link" href="../blog/grid.html">Blog</a>
                <a class="nav-link" href="../page/contact-1.html">Contact</a>
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
