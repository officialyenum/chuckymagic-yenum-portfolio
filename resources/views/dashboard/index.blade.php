@extends('layouts.dashboard')

@section('title')
    Yenum
@endsection

@section('css')

@endsection

@section('content')

      <!-- Header -->
      <header class="header h-fullscreen" style="background-image: linear-gradient(135deg, #f9f7ff 0%, #fff 50%, #f6f3ff 100%);">
        <div class="container">
        <div class="row align-items-center h-100">

            <div class="col-lg-6">
            <h1 class="fw-600 mt-5">Yenum<span class="text-primary">.dev</span><br><span class="text-info">Aspiring</span> Game Programmer.</h1>
            <p class="lead mt-2 mb-6">I have a serious passion for building Games and creating solutions to complex problems, I write sometimes, Arsenal Super Fan and an Anime Freak. My ultimate quest is to develop web, mobile and console games that will blow your mind.</p>
            <p class="gap-xy">
                <a class="btn btn-round btn-primary mw-200" href="#">Sign up — Free</a>
                <a class="btn btn-round btn-outline-secondary mw-200" href="#">Learn more</a>
            </p>
            </div>

            <div class="col-lg-5 mt-5 ml-auto d-none d-lg-block">
                <img class="rounded w-100 h-100 cover" src="{{asset('img/yenum/portrait-4.jpg')}}" alt="img">
            </div>

        </div>
        </div>
    </header><!-- /.header -->

      <!-- Header -->
      <header class="header text-white" style="background-image: url({{asset('img/yenum/wide-2.jpg')}})" data-overlay="8">
        <div class="container text-center">

          <div class="row">
            <div class="col-lg-8 mx-auto">

              <h1>Yenum is <span class="text-primary" data-typing="A Coder, A Writer, A Thinker, A Vibe!!!"></span></h1>
              <p class="lead-2 mt-5">“In this life ensure you #EnjoyThings”</p>
              <P> -- Yenum Opone -- </P>
              <hr class="w-60px my-7">

              <a class="btn btn-lg btn-round btn-white" href="https://officialyenum.medium.com">Read My Medium Articles</a>

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

            <section id="portfolio" class="section bg-gray">
                <div class="container">
                <header class="section-header">
                    <h2>Portfolio</h2>
                    <small>Latest Projects</small>
                    <hr>
                </header>


                <div class="row gap-y gap-2">
                    @foreach ($posts as $key => $post)
                        <div class="col-6 col-lg-3">
                            <div class="card shadow-1 hover-shadow-6">
                                <a class="p-2" href="{{route('dashboard.show',$post->slug)}}">
                                <img class="card-img-top" src="{{$post->featured_image}}" alt="screenshot">
                                </a>
                                <div class="card-body flexbox">
                                    <h6 class="mb-0">
                                        <a class="small fw-600 fs-12" href="{{$post->web_url}}">{{$post->title}}</a>
                                    </h6>
                                </div>
                                <div class="row justify-content-center mx-2 mb-2">
                                    @if ($post->web_url)
                                        <div class="col-xs-3">
                                            <a class="text-inherit mx-2" href="{{$post->web_url}}"><i class="fa fa-globe pr-1 opacity-60"  style="font-size: 2em;"></i></a>
                                        </div>
                                    @endif
                                    @if ($post->playstore_url)
                                        <div class="col-xs-3">
                                            <a class="text-inherit mx-2" href="{{$post->playstore_url}}"><i class="fa fa-google pr-1 opacity-60" style="font-size: 2em;"></i></a>
                                        </div>
                                    @endif
                                    @if ($post->appstore_url)
                                        <div class="col-xs-3">
                                            <a class="text-inherit mx-2" href="{{$post->appstore_url}}"><i class="fa fa-apple pr-1 opacity-60" style="font-size: 2em;"></i></a>
                                        </div>
                                    @endif
                                    @if ($post->github_url)
                                        <div class="col-xs-3">
                                            <a class="text-inherit mx-2" href="{{$post->github_url}}"><i class="fa fa-github pr-1 opacity-60" style="font-size: 2em;"></i></a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="text-center mt-8">
                    <a class="btn btn-secondary" href="#">Load more</a>
                </div>

                </div>
            </section>

            <!--
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            | Articles
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            !-->

            <section id="articles" class="section bg-gray">
                <div class="container">
                    <header class="section-header">
                        <h2>Blog</h2>
                        <small>Latest Articles</small>
                        <hr>
                    </header>
                    <div class="row gap-y mt-8">
                        @foreach ($posts as $key => $post)
                        <div class="col-md-6 col-lg-4">
                            <div class="card border hover-shadow-6 d-block">
                                <a href="{{route('dashboard.show',$post->slug)}}"><img class="card-img-top" src="{{$post->featured_image}}" alt="Card image cap"></a>
                                {{-- <div class="col-6 col-lg-3" data-shuffle="item" data-groups="{{$post->category->name}}"> --}}
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{route('dashboard.show',$post->slug)}}">{{$post->title}}</a></h5>
                                    <p>{{$post->description}}</p>
                                    <a class="fw-600 fs-12" href="{{route('dashboard.show',$post->slug)}}">Read more <i class="ti-angle-right fs-7 pl-2"></i></a>
                                </div>
                            </div>
                        </div>
                            {{-- @if ($key == 3)
                                <div class="col-lg-4 d-none d-lg-flex">
                                    <div class="card border hover-shadow-6 d-block">
                                        <a href="{{route('dashboard.show',$post->slug)}}"><img class="card-img-top" src="{{$post->image_url}}" alt="Card image cap"></a>
                                        <div class="col-6 col-lg-3" data-shuffle="item" data-groups="{{$post->category->name}}">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="{{route('dashboard.show',$post->slug)}}">{{$post->title}}</a></h5>
                                            <p>{{$post->description}}</p>
                                            <a class="fw-600 fs-12" href="{{route('dashboard.show',$post->slug)}}">Read more <i class="ti-angle-right fs-7 pl-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border hover-shadow-6 d-block">
                                        <a href="{{route('dashboard.show',$post->slug)}}"><img class="card-img-top" src="{{$post->image_url}}" alt="Card image cap"></a>
                                        <div class="col-6 col-lg-3" data-shuffle="item" data-groups="{{$post->category->name}}">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="{{route('dashboard.show',$post->slug)}}">{{$post->title}}</a></h5>
                                            <p>{{$post->description}}</p>
                                            <a class="fw-600 fs-12" href="{{route('dashboard.show',$post->slug)}}">Read more <i class="ti-angle-right fs-7 pl-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif --}}
                        @endforeach
                    </div>
                    <br><br>
                    <p class="text-center"><a href="#">Browse all blog posts</a></p>
                </div>
            </section>

            <!--
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            | Get a Quote
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            !-->
            {{-- <section class="section bg-gray text-center">

                <h2 class="mb-6">Get a Quote</h2>
                <p class="lead text-muted">We’ve completed more than 100+ project for our amazing clients, if you interested?</p>
                <hr class="w-50px">
                <a class="btn btn-lg btn-round btn-success" href="#">Design your site now</a>

            </section> --}}


        </main>
        <!-- /.main-content -->
@endsection

@section('scripts')

@endsection



