<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(User $user)
    {
        // Автоматически находит авторизованного пользователя
        $user = Auth::user();

        // Получаем рейтинги для текущего пользователя
        $ratings = $user->ratings()->get();

        // Возвращаем представление с переданными данными
        return view('user.home', compact('user', 'ratings'));
    }
}
