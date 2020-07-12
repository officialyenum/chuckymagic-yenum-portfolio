<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index()
    {
        return view('games.index');
    }

    public function csgame()
    {
        return view('games.csgame.index');
    }
}
