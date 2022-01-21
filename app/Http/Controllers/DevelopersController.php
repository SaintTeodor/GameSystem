<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class DevelopersController extends Controller
{


    public function index()
    {
        $developers = auth()->user()->developers();
        return view('devboard', compact('developers'));
    }
    public function add()
    {
        return view('adddev');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'dev' => 'required'
        ]);
        $this->validate($request, [
            'foundyear' => 'required'
        ]);
        $developer = new Developer();
        $developer->dev = $request->dev;
        $developer->foundyear = $request->foundyear;
        $developer->user_id = auth()->user()->id;
        $developer->save();
        return redirect('/dev');
    }

    public function edit(Developer $developer)
    {

        if (auth()->user()->id == $developer->user_id)
        {
            return view('editdev', compact('developer'));
        }
        else {
            return redirect('/dev');
        }
    }

    public function update(Request $request, Developer $developer)
    {
        if(isset($_POST['delete'])) {
            $developer->delete();
            return redirect('/dev');
        }
        else
        {
            $this->validate($request, [
                'dev' => 'required'
            ]);
            $this->validate($request, [
                'foundyear' => 'required'
            ]);
            $developer->dev = $request->dev;
            $developer->foundyear = $request->foundyear;
            $developer->save();
            return redirect('/dev');
        }
    }
}
