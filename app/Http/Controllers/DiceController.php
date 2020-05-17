<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiceController extends Controller
{
    public function index()
    {
        return view('games.dice.index');
    }

    public function single()
    {
        return view('games.dice.single');
    }

    public function multiplayer()
    {
        return view('games.dice.multiplayer');
    }
}
