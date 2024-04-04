<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('ratings')->get();

        return view('movie.index', ['movies' => $movies]);
    }

    public function show($id)
    {
        // Получить фильм по ID
        $movie = Movie::findOrFail($id);

        // Вернуть представление с фильмом
        return view('movie.show', ['movie' => $movie]);
    }

    public function create() {
        return view('movie.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Movie::create($request->all());

        return redirect()->route('movie.index')->with('success','Post created successfully.');
    }

}
