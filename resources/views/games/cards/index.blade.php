@extends('layouts.game')

@section('content')

<section class="section overflow-hidden">
    <div class="container text-white">
        <h4 class="d-flex justify-content-center mt-2">Card Games</h4>

        <div data-provide="shuffle">
            <ul class="nav nav-center nav-bold nav-uppercase nav-slash mb-7" data-shuffle="filter">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-shuffle="button">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-shuffle="button" data-group="single">Single</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-shuffle="button" data-group="multiplayer">Multiplayer</a>
                </li>
            </ul>


            <div class="row gap-y gap-2" data-shuffle="list">

                <div class="col-6 col-lg-3" data-shuffle="item" data-groups="single">
                    <a class="portfolio-1" href="{{ route('card.high-low')}}">
                    <img src="{{asset('img/games/highorlow.jpg')}}" alt="screenshot">
                    <div class="portfolio-detail">
                        <h5>High or Low</h5>
                        <p>Predict the next card</p>
                    </div>
                    </a>
                </div>

                <div class="col-6 col-lg-3" data-shuffle="item" data-groups="multiplayer">
                    <a class="portfolio-1" href="{{ route('card.card-wars')}}">
                    <img src="{{asset('img/games/cardwars.jpg')}}" alt="screenshot">
                    <div class="portfolio-detail">
                        <h5>Card Wars</h5>
                        <p>Compete in card wars</p>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
@endsection

@section('scripts')



@endsection
