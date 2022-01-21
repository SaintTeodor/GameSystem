<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
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
        $genre->save();
        return redirect('/genre');
    }

    public function edit(Genre $genre)
    {


            return view('editgenre', compact('genre'));

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
