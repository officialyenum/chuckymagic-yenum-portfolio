@extends('layouts.cs')

@section('content')
<section class="section overflow-hidden">
    <h5>Cs50 Final Project Game</h5>
</section>
@endsection

@section('css')
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
    <script src="{{ asset('js/csgame/lib/quintus.js')}}"></script>
    <script src="{{ asset('js/csgame/lib/quintus_sprites.js')}}"></script>
    <script src="{{ asset('js/csgame/lib/quintus_scenes.js')}}"></script>
    <script src="{{ asset('js/csgame/lib/quintus_input.js')}}"></script>
    <script src="{{ asset('js/csgame/lib/quintus_anim.js')}}"></script>
    <script src="{{ asset('js/csgame/lib/quintus_2d.js')}}"></script>
    <script src="{{ asset('js/csgame/lib/quintus_touch.js')}}"></script>
    <script src="{{ asset('js/csgame/lib/quintus_ui.js')}}"></script>
    <script src="{{ asset('js/csgame/lib/quintus_audio.js')}}"></script>
    <script src="{{ asset('js/csgame/racemath_characters.js')}}"></script>
    <script src="{{ asset('js/csgame/racemath_ui.js')}}"></script>
@endsection

@section('scripts')
<script>
    window.addEventListener("load",function() {
    var Q = window.Q = Quintus({development: true})
        .include("Sprites, Scenes, Input, 2D, Touch, UI, Audio, RacemathCharacters, RacemathUI")
        .setup({
            width: 320,
            height: 480
        }).touch();

    //enable sound
    Q.enableSound();
    //values for collision detection
    Q.SPRITE_NONE = 0;
    Q.SPRITE_RACER = 1;
    Q.SPRITE_OTHER = 2;


    Q.scene("level",function(stage) {
      //we want to make the player collide with this layer
        var collisionLayer = new Q.TileLayer({ dataAsset: 'level_collision.json', sheet: 'tiles', type: Q.SPRITE_OTHER});

      //backgroud elements, they don't collide with the player
        var backgroundLayer = new Q.TileLayer({ dataAsset: 'level_background.json', sheet: 'tiles', type: Q.SPRITE_NONE});

      //add these elements to the stage
        stage.collisionLayer(collisionLayer);
        stage.insert(backgroundLayer);

        stage.loadAssets(stage.options.elements);

        var player = Q("Player", 0).first();
        Q.state.set(stage.options.mathOperations);

        stage.add("viewport").follow(player,{x: true, y: true},{minX: 0, maxX: backgroundLayer.p.w, minY: 0, maxY: backgroundLayer.p.h});
    });


    Q.scene("endGame",function(stage) {
        var box = new Q.UI.Container({
            x:Q.width/2,
            y:Q.height/2,
            fill:"rgba(0,0,0,0.5)"
        })
        stage.insert(box);

        var button = new Q.UI.Button({
            x: 0,
            y: 0,
            fill:"#CCCCCC",
            label: 'Play Again'
        })
        box.insert(button);

        var label = new Q.UI.Text({
            x: 10,
            y: -10 - button.p.h,
            label: stage.options.label
        })
        box.insert(label);
        box.fit(20);

        button.on("click", function() {
            Q.stageScene("level", 0, Q.stages[0].options);
            Q.stageScene("ui",1);
            stage.stop();
        })
    });



        Q.load("sprites.png, sprites.json, level_collision.json, level_background.json, tiles.png, boom.mp3, win.mp3", function() {
            Q.sheet("tiles","tiles.png", { tilew: 32, tileh: 32 });
            Q.compileSheets("sprites.png","sprites.json");
            Q.stageScene("level", 0, {
                elements: [
                    ['Rival', {x:0,y:130, sheet: 'bluerival'}],
                    ['Rival', {x:0,y:130, sheet: 'greenrival'}],
                    ['Rival', {x:0,y:130, sheet: 'purplerival'}],
                    ['Princess', {x:2500,y:130, sheet: 'girl'}],
                    ['Player', {x:0,y:130, vx: 50}],
                ],
                mathOperations: {operations_min: 0, operations_max:10}
            });
            Q.stageScene("ui",1);
        });
    });
</script>
@endsection
