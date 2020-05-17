<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index()
    {
        return view('games.cards.index');
    }

    public function highLow()
    {
        return view('games.cards.high-low-game');
    }

    public function cardWars()
    {
        return view('games.cards.card-wars-game');
    }
}
