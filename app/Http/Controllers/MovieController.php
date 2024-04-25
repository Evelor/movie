<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Rating;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    public function destroy(Request $request, Movie $movie, int $id): RedirectResponse
    {
        $movie = $movie->whereId($id)->firstOrFail();
        $movie->delete();

        return redirect()->route('index')
            ->with('success', 'The movie deleted successfully');
    }
    public function rateMovie(Request $request, Movie $movie, int $id): RedirectResponse
    {
        $user = Auth::user();

        $movie = $movie->findOrFail($id);

       if ($movie->ratedBy($user)) {

           $rating = $movie->ratings()->where('user_id', $user->id)->first();
           $rating->rating = $request->rating;
           $rating->save();
       } else {
           $rating = Rating::create([
               'user_id' => auth()->id(),
               'movie_id' => $movie->id,
               'rating' => $request->rating,
           ]);
           $movie->ratings()->save($rating);
//        }
       }


        return redirect()->route('index')
            ->with('success', 'The movie has been rate');

    }

}
