<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movies', [App\Http\Controllers\MovieController::class, 'index'])->name('index');
Route::get('/movies/create', [App\Http\Controllers\MovieController::class, 'create'])->name('create');


Route::get('/movies/{id}', [App\Http\Controllers\MovieController::class, 'show'])->name('show');
