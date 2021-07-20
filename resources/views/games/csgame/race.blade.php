@extends('layouts.cs')

@section('content')
<section class="section overflow-hidden">
    <h5>Cs50 Final Project Game</h5>
</section>
@endsection

@section('css')
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
    <script src="{{ asset('js/race/dist/createjs.min.js')}}"></script>
    <script src="{{ asset('js/race/game.js')}}"></script>
@endsection

@section('scripts')

@endsection
