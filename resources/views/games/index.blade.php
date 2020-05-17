@extends('layouts.game')

@section('content')

<section class="section overflow-hidden">
    <div class="container">
        <h4 class="d-flex justify-content-center mt-2">Games</h4>

        <div data-provide="shuffle">
            <ul class="nav nav-center nav-bold nav-uppercase nav-slash mb-7" data-shuffle="filter">
                <li class="nav-item">
                    <a class="nav-link navbar-light active" href="#" data-shuffle="button">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-light" href="#" data-shuffle="button" data-group="virtual">Virtual</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-light" href="#" data-shuffle="button" data-group="casino">Casino</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-light" href="#" data-shuffle="button" data-group="board">Board</a>
                </li>
            </ul>


            <div class="row gap-y gap-2" data-shuffle="list">
                <div class="col-6 col-lg-3" data-shuffle="item" data-groups="virtual,casino">
                    <a class="portfolio-1" href="{{ route('card.index')}}">
                    <img src="{{asset('img/games/card.jpg')}}" alt="screenshot">
                    <div class="portfolio-detail">
                        <h5>Cards</h5>
                        <p>Virtual, Casino</p>
                    </div>
                    </a>
                </div>


                <div class="col-6 col-lg-3" data-shuffle="item" data-groups="virtual">
                    <a class="portfolio-1" href="{{ route('dice.index')}}">
                    <img src="{{asset('img/games/dice.jpg')}}" alt="screenshot">
                    <div class="portfolio-detail">
                        <h5>Dice</h5>
                        <p>Virtual</p>
                    </div>
                    </a>
                </div>

                <div class="col-6 col-lg-3" data-shuffle="item" data-groups="board">
                    <a class="portfolio-1" href="{{ route('dice.index')}}">
                    <img src="{{asset('img/games/chess.jpg')}}" alt="screenshot">
                    <div class="portfolio-detail">
                        <h5>Chess</h5>
                        <p>Board</p>
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
    <style>
        a.hover {
            color: teal;
        }
        a{
            color: white
        }
    </style>
@endsection

@section('scripts')



@endsection
