<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('ratings')->get();

        return view('movie.index', ['movies' => $movies]);
    }

    public function create()
    {
        return view('movie.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'localisation' => 'required',
            'name' => 'required',
            'year' => 'required',
            'director' => 'required',
            'image' => 'required',
        ]);

        Movie::create($request->all());

        return redirect()->route('index')->with('success', 'The movie has been added');
    }

    public function show($id)
    {
        // Получить фильм по ID
        $movie = Movie::findOrFail($id);

        // Вернуть представление с фильмом
        return view('movie.show', ['movie' => $movie]);
    }

    public function edit($id)
    {
        return view('movie.edit', ['movie' => Movie::findOrFail($id)]);
    }

    public function update(Request $request, int $id, Movie $movie): RedirectResponse
    {
        $validatedData = $request->validate([
            'localisation' => 'required',
            'name' => 'required',
            'year' => 'required',
            'director' => 'required',
            'image' => 'required',
        ]);

        $movie = $movie->whereId($id)->firstOrFail();
        $movie->update($validatedData);

        return redirect()->route('index')
            ->with('success', 'The movie updated successfully');
    }


    public function destroy(Movie $movie, int $id): RedirectResponse
    {
        $movie = $movie->whereId($id)->firstOrFail();
        $movie->delete();

        return redirect()->route('index')
            ->with('success', 'The movie deleted successfully');
    }
}
