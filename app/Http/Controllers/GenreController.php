<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = auth()->user()->genres();
        return view('genre', compact('genres'));
    }
    public function add()
    {
        return view('addgenre');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'genrename' => 'required'
        ]);
        $genre = new Genre();
        $genre->genrename = $request->genrename;
        $genre->user_id = auth()->user()->id;
        $genre->save();
        return redirect('/genre');
    }

    public function edit(Genre $genre)
    {

        if (auth()->user()->id == $genre->user_id)
        {
            return view('editgenre', compact('genre'));
        }
        else {
            return redirect('/genre');
        }
    }

    public function update(Request $request, Genre $genre)
    {
        if(isset($_POST['delete'])) {
            $genre->delete();
            return redirect('/genre');
        }
        else
        {
            $this->validate($request, [
                'genrename' => 'required'
            ]);
            $genre->genrename = $request->genrename;
            $genre->save();
            return redirect('/genre');
        }
    }
}
