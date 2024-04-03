<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('ratings')->get();

        return view('movie', ['movies' => $movies]);
    }

    public function show($id)
    {
        // Получить фильм по ID
        $movie = Movie::findOrFail($id);

        // Вернуть представление с фильмом
        return $movie;
    }
}
