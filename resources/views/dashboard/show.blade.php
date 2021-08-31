@extends('layouts.dashboard')

@section('title')
    Yenum | {{ $post->title }}
@endsection

@section('css')

@endsection

@section('content')
    <!-- Header -->
    <header class="header text-center pb-0">
        <div class="container">
            <h1 class="display-4">{{ $post->title }} </h1>
            <p class="lead-2 mt-5">By {{ $post->user->username }}</p>
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
                        <img src="{{ $post->featured_image }}" alt="project image">
                    </div>


                    <div class="col-md-4">
                        <h5>Intro</h5>

                        <p>{{ $post->description }}</p>

                        <ul class="project-detail mt-7">
                            <li>
                                <strong>Category</strong>
                                <span>
                                    <a class="badge badge-pill badge-secondary"
                                        href={{ route('dashboard.category', $post->category->id) }}>
                                        {{ $post->category->name }}
                                    </a>
                                </span>
                            </li>

                            <li>
                                <strong>Published</strong>
                                <span>{{ $post->published_at->diffForHumans() }}</span>
                            </li>

                            @if ($post->tags->count() > 0)
                                <li>
                                    <strong>Tags</strong>
                                    <span>
                                        @foreach ($post->tags as $tag)
                                            <a class="badge badge-pill badge-secondary"
                                                href={{ route('dashboard.tag', $tag->id) }}>
                                                {{ $tag->name }}
                                            </a>
                                        @endforeach
                                    </span>
                                </li>
                            @endif

                            <li>
                                <strong>Url</strong>
                                @if ($post->github_url)
                                    <a class="badge badge-pill badge-secondary" href={{ $post->github_url }}>
                                        Github
                                    </a>
                                @endif
                                @if ($post->appstore_url)
                                    <a class="badge badge-pill badge-secondary" href={{ $post->appstore_url }}>
                                        App Store
                                    </a>
                                @endif
                                @if ($post->playstore_url)
                                    <a class="badge badge-pill badge-secondary" href={{ $post->playstore_url }}>
                                        Playstore
                                    </a>
                                @endif
                                @if ($post->web_url)
                                    <a class="badge badge-pill badge-secondary" href={{ $post->web_url }}>
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
                        {!! $post->content !!}
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

                        <div class="card my-4">
                            <div class="card-header">
                                Add a Comment
                            </div>
                            <div class="card-body">
                                @auth
                                    <form action="{{ route('comments.store', $post->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-12 col-md-6">
                                                <input class="form-control" type="text" value="{{ auth()->user()->name }}"
                                                    readonly>
                                            </div>

                                            <div class="form-group col-12 col-md-6">
                                                <input class="form-control" type="text" value="{{ auth()->user()->email }}"
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <textarea name="content" class="form-control" placeholder="Comment"
                                                rows="4"></textarea>
                                        </div>

                                        <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-info text-white"> Sign in to Add a
                                        comment</a>
                                @endauth
                            </div>
                        </div>

                        <hr>

                        @if ($post->comments->count() > 0)
                            @foreach ($post->comments as $comment)
                                <div class="media-list">
                                    <div class="media">
                                        <img class="avatar avatar-sm mr-4"
                                            src="{{ Gravatar::src($comment->owner->email) }}" alt="...">

                                        <div class="media-body">
                                            <div class="small-1">
                                                <strong>{{ $comment->owner->name }}</strong>
                                                <time class="ml-4 opacity-70 small-3"
                                                    datetime="2018-07-14 20:00">{{ $comment->created_at->diffforhumans() }}</time>
                                            </div>
                                            <p class="small-2 mb-0">{{ $comment->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="d-flex justify-content-center text-center">
                                No Comments for this post
                            </div>
                        @endif

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

    </main><!-- /.main-content -->


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

                            <p>Key letters, explain which writing we he carpeting or fame, the itch expand medical amped
                                through constructing time. And scarfs, gain, get showed accounts decades.</p>

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
                            <img class="fill-parent fit-cover rounded-right" src="../assets/img/portfolio/4.jpg"
                                alt="project image">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
