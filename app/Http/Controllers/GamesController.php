<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Game;

class GamesController extends Controller
{
    public function index()
    {

        $games = Game::all();

        return view('dashboard', compact('games'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $games = Game::with('developer', 'genre')->select('games.*')
            ->join('developers', 'games.dev_id', '=', 'developers.dev_id')
            ->join('genres', 'games.genre_id', '=', 'genres.genre_id')
            ->where('games.description', 'LIKE',  '%' . $search . '%')
            ->orWhere('developers.dev', 'LIKE',  '%' . $search . '%')
            ->orWhere('genres.genrename', 'LIKE',  '%' . $search . '%')
            ->orWhere('games.relyear', 'LIKE', '%' . $search . '%')->get();
        return view('dashboard', compact('games'));
    }
    public function add()
    {
        $genre = Genre::all();
        $dev = Developer::all();

        return view('add', compact('genre', 'dev'));
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'description' => 'required',
            'relyear' => 'required',
            'genre_id' => 'required',
            'dev_id' => 'required'

        ]);
        $game = new Game();
        $game->description = $request->description;
        $game->relyear = $request->relyear;
        $game->genre_id = $request->genre_id;
        $game->dev_id = $request->dev_id;
        $game->save();
        return redirect('/dashboard');
    }

    public function edit(Game $game)
    {



            return view('edit', compact('game'));

    }

    public function update(Request $request, Game $game)
    {
        if(isset($_POST['delete'])) {
            $game->delete();
            return redirect('/dashboard');
        }
        else
        {
            $this->validate($request, [
                'description' => 'required',
                'relyear' => 'required',
                'genre_id' => 'required',
                'dev_id' => 'required'
            ]);

            $game->description = $request->description;
            $game->relyear = $request->relyear;
            $game->genre_id = $request->genre_id;
            $game->dev_id = $request->dev_id;
            $game->save();
            return redirect('/dashboard');
        }
    }
}
