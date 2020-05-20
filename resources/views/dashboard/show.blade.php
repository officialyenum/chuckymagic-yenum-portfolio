<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>{{$project->title}}</title>

    <!-- Styles -->
    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">
  </head>

  <body>



    <nav class="navbar navbar-expand-lg navbar-dark navbar-stick-dark" data-navbar="sticky">
        <div class="container">

          <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="{{route('dashboard')}}">
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

          <a class="btn btn-xs btn-round btn-success" href="{{ route('games.index')}}">Play Now</a>

        </div>
    </nav><!-- /.navbar -->
    <!-- Header -->
    <header class="header text-center pb-0">
      <div class="container">
        <h1 class="display-4">{{ $project->title }} {{$project->category->name}} </h1>
        <p class="lead-2 mt-5">By {{ $project->user->name }}</p>
      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Project details
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section bb-1">
        <div class="container">

          <div class="row">
            <div class="col-md-8 mb-6 mb-md-0">
              <img src="{{$project->image_url}}" alt="project image">
            </div>


            <div class="col-md-4">
              <h5>Project detail</h5>

              <p>{{$project->description}}</p>

              <ul class="project-detail mt-7">
                <li>
                  <strong>Category</strong>
                  <span>
                    @foreach ($project->subcategories as $subcategory)
                        <a class="badge badge-pill badge-secondary" href={{route('dashboard.subcategory',$subcategory->id)}}>
                            {{$subcategory->name}}
                        </a>
                    @endforeach
                </span>
                </li>

                <li>
                  <strong>Published</strong>
                  <span>{{$project->published_at->diffForHumans()}}</span>
                </li>

                @if ($project->tags->count() > 0)
                    <li>
                        <strong>Framework & Editor Used</strong>
                        <span>
                            @foreach ($project->tags as $tag)
                            <a class="badge badge-pill badge-secondary" href={{route('dashboard.tag',$tag->id)}}>
                                {{$tag->name}}
                            </a>
                            @endforeach
                        </span>
                    </li>
                @endif

                @if ($project->languages->count() > 0)
                    <li>
                    <strong>Language</strong>
                    <span>
                    @foreach ($project->languages as $language)
                        <a class="badge badge-pill badge-secondary" href={{route('dashboard.language',$language->id)}}>
                            {{$language->name}}
                        </a>
                    @endforeach
                    </span>
                    </li>
                @endif

                <li>
                  <strong>Url</strong>
                  @if ($project->github_url)
                    <a class="badge badge-pill badge-secondary" href={{$project->github_url}}>
                        Github
                    </a>
                  @endif
                  @if ($project->appstore_url)
                  <a class="badge badge-pill badge-secondary" href={{$project->appstore_url}}>
                      App Store
                  </a>
                  @endif
                  @if ($project->playstore_url)
                  <a class="badge badge-pill badge-secondary" href={{$project->playstore_url}}>
                      Playstore
                  </a>
                  @endif
                  @if ($project->web_url)
                  <a class="badge badge-pill badge-secondary" href={{$project->web_url}}>
                      Website
                  </a>
                  @endif
                </li>

                <li>
                  <strong>Share</strong>
                  <div class="social social-sm social-gray social-inline mt-2">
                    <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>
                    <a class="social-dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                  </div>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </section>

      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Content
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section" id="section-content">
        <div class="container">

          <div class="row">
            <div class="col-lg-8 mx-auto">
                {!! $project->trixRender("content") !!}
            </div>
          </div>

        </div>
      </div>



      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Comments
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section bg-gray">
        <div class="container">

          <div class="row">
            <div class="col-lg-8 mx-auto">


                <form action="#" method="POST">

                  <div class="row">
                    <div class="form-group col-12 col-md-6">
                      <input class="form-control" type="text" placeholder="Name">
                    </div>

                    <div class="form-group col-12 col-md-6">
                      <input class="form-control" type="text" placeholder="Email">
                    </div>
                  </div>

                  <div class="form-group">
                    <textarea class="form-control" placeholder="Comment" rows="4"></textarea>
                  </div>

                  <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
                </form>

                <hr>

                <div class="media-list">

                    <div class="media">
                    <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/1.jpg" alt="...">

                    <div class="media-body">
                        <div class="small-1">
                        <strong>Maryam Amiri</strong>
                        <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">24 min ago</time>
                        </div>
                        <p class="small-2 mb-0">Thoughts his tend and both it fully to would the their reached drew project the be I hardly just tried constructing I his wonder, that his software and need out where didn't the counter productive.</p>
                    </div>
                    </div>



                    <div class="media">
                    <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/2.jpg" alt="...">

                    <div class="media-body">
                        <div class="small-1">
                        <strong>Hossein Shams</strong>
                        <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">6 hours ago</time>
                        </div>
                        <p class="small-2 mb-0">Was my suppliers, has concept how few everything task music.</p>
                    </div>
                    </div>



                    <div class="media">
                    <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/3.jpg" alt="...">

                    <div class="media-body">
                        <div class="small-1">
                        <strong>Sarah Hanks</strong>
                        <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">Yesterday</time>
                        </div>
                        <p class="small-2 mb-0">Been me have the no a themselves, agency, it that if conduct, posts, another who to assistant done rattling forth there the customary imitation.</p>
                    </div>
                    </div>

                </div>

            </div>
          </div>

        </div>
      </div>


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Related projects
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section">
        <div class="container">

          <h5 class="mb-6">Related Projects</h5>

            <div class="row gap-y gap-2" data-shuffle="list">

              <div class="col-6 col-lg-3" data-shuffle="item" data-groups="bag,box">
                <a class="portfolio-1" href="#" data-toggle="modal" data-target="#modal-portfolio">
                  <img src="../assets/img/portfolio/1.jpg" alt="screenshot">
                  <div class="portfolio-detail">
                    <h5>Phone Bag</h5>
                    <p>Bag, Box</p>
                  </div>
                </a>
              </div>


              <div class="col-6 col-lg-3" data-shuffle="item" data-groups="book">
                <a class="portfolio-1" href="#" data-toggle="modal" data-target="#modal-portfolio">
                  <img src="../assets/img/portfolio/2.jpg" alt="screenshot">
                  <div class="portfolio-detail">
                    <h5>Mockup Book</h5>
                    <p>Book</p>
                  </div>
                </a>
              </div>


              <div class="col-6 col-lg-3" data-shuffle="item" data-groups="box">
                <a class="portfolio-1" href="#" data-toggle="modal" data-target="#modal-portfolio">
                  <img src="../assets/img/portfolio/3.jpg" alt="screenshot">
                  <div class="portfolio-detail">
                    <h5>T-shirt</h5>
                    <p>Box</p>
                  </div>
                </a>
              </div>


              <div class="col-6 col-lg-3" data-shuffle="item" data-groups="bottle">
                <a class="portfolio-1" href="#" data-toggle="modal" data-target="#modal-portfolio">
                  <img src="../assets/img/portfolio/5.jpg" alt="screenshot">
                  <div class="portfolio-detail">
                    <h5>Shampoo</h5>
                    <p>Bottle</p>
                  </div>
                </a>
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
        <p class="lead text-muted">We’ve Completed More Than 100+ project for our amazing clients, if you interested?</p>
        <hr class="w-50px">
        <a class="btn btn-lg btn-round btn-success" href="#">Design your site now</a>

      </section>


    </main><!-- /.main-content -->


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


    <!-- Modal - Portfolio -->
    <div class="modal fade" id="modal-portfolio" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

          <div class="modal-body p-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <div class="row no-gutters">
              <div class="col-6 col-md-5 mx-auto py-7">
                <h5>Paper cup mockup</h5>

                <p>Key letters, explain which writing we he carpeting or fame, the itch expand medical amped through constructing time. And scarfs, gain, get showed accounts decades.</p>

                <ul class="project-detail mt-7">
                  <li>
                    <strong>Client</strong>
                    <span>Envato Inc.</span>
                  </li>

                  <li>
                    <strong>Date</strong>
                    <span>June 27, 2019</span>
                  </li>

                  <li>
                    <strong>Skills</strong>
                    <span>Design, HTML, CSS, Javascript</span>
                  </li>

                  <li>
                    <strong>Address</strong>
                    <a href="http://thetheme.io/thesaas">thetheme.io/thesaas</a>
                  </li>
                </ul>
              </div>


              <div class="col-5 col-md-6 position-relative" style="min-height: 400px;">
                <img class="fill-parent fit-cover rounded-right" src="../assets/img/portfolio/4.jpg" alt="project image">
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


    <!-- Scripts -->
    <script src="{{asset('js/page.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

  </body>
</html>
