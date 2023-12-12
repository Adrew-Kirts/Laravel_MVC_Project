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

//Route::get('/movie', function () {
//    return view('pages.movies-list');
//});

Route::get('/movies', [MovieController::class, 'index']);

//Route::get('/movie/{id}', function (string $id) {
//    return view('pages.movie-details', ['id' => $id]);
//});

Route::get('/movie/{id}', [MovieController::class, 'show']);
