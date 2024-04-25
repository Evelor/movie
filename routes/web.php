<?php

use Illuminate\Support\Facades\Auth;
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
Route::post('/movies', [App\Http\Controllers\MovieController::class, 'store'])->name('store');


Route::get('/movies/{id}', [App\Http\Controllers\MovieController::class, 'show'])->name('show');
Route::get('/movies/{id}/edit', [App\Http\Controllers\MovieController::class, 'edit'])->name('edit');
Route::put('/movies/{id}', [App\Http\Controllers\MovieController::class, 'update'])->name('update');
Route::delete('/movies/{id}', [App\Http\Controllers\MovieController::class, 'destroy'])->name('destroy');
Route::post('/movies/{id}', [App\Http\Controllers\MovieController::class, 'rateMovie'])->name('rateMovie');

