<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

Route::get('/', function(){
    return view('pages.home');
});

Route::get('/movies', [MovieController::class, 'index']);

Route::get('/movie/{id}', [MovieController::class, 'showMovieById'])->name('showMovieById');

Route::get('/movies/letter/{char}', [MovieController::class, 'showMovieByChar']);

Route::get('/backoffice', function(){
    return view('pages.backoffice');
});
