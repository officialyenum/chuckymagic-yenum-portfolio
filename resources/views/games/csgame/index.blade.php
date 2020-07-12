@extends('layouts.cs')

@section('content')

<section class="section overflow-hidden">
    <h5>Cs50 Final Project Game</h5>
    <canvas id="canvas"></canvas>
</section>
@endsection

@section('css')
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('js/csgame/lib/quintus.js')}}"></script>
<script src="{{ asset('js/csgame/lib/quintus_sprites.js')}}"></script>
<script src="{{ asset('js/csgame/lib/quintus_scenes.js')}}"></script>
<script src="{{ asset('js/csgame/lib/quintus_input.js')}}"></script>
<script src="{{ asset('js/csgame/lib/quintus_anim.js')}}"></script>
<script src="{{ asset('js/csgame/lib/quintus_2d.js')}}"></script>
<script src="{{ asset('js/csgame/lib/quintus_touch.js')}}"></script>
<script src="{{ asset('js/csgame/lib/quintus_ui.js')}}"></script>



@endsection
