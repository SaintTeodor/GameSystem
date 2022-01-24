<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Image;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $img = Image::all();
        return view('home', compact('games', 'img'));
    }

    public function search(Request $request)
    {
        $searchhome = $request->get('search');
        $games = Game::with('developer', 'genre')->select('games.*')
            ->join('developers', 'games.dev_id', '=', 'developers.dev_id')
            ->join('genres', 'games.genre_id', '=', 'genres.genre_id')
            ->where('games.description', 'LIKE',  '%' . $searchhome . '%')
            ->orWhere('developers.dev', 'LIKE',  '%' . $searchhome . '%')
            ->orWhere('genres.genrename', 'LIKE',  '%' . $searchhome . '%')
            ->orWhere('games.relyear', 'LIKE', '%' . $searchhome . '%')->get();
        $img = Image::all();
        return view('home', compact('games', 'img'));
    }
}
