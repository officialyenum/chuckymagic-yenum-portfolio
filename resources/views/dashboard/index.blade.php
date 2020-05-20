@extends('layouts.dashboard')

@section('title')
    Yenum
@endsection

@section('css')

@endsection

@section('content')
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
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="#" data-shuffle="button" data-group={{$category->name}}>{{$category->name}}</a>
                </li>
                @endforeach
              </ul>


              <div class="row gap-y gap-2" data-shuffle="list">

                @foreach ($projects as $project)
                    <div class="col-6 col-lg-3" data-shuffle="item" data-groups="{{$project->category->name}}">
                    <a class="portfolio-1" href="{{route('dashboard.show',$project->id)}}">
                        <img src="{{$project->image_url}}" alt="screenshot">
                        <div class="portfolio-detail">
                        <h5>{{$project->title}}</h5>
                        <p>
                            @foreach ($project->subCategories as $subCategory)
                                {{$subCategory->name}},
                            @endforeach
                        </p>
                        </div>
                    </a>
                    </div>
                @endforeach

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
@endsection

@section('scripts')

@endsection



