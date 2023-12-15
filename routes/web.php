<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/movies', [MovieController::class, 'index'])->name('movie.list')->name('allMovies');

Route::get('/movie/{id}', [MovieController::class, 'showMovieById'])->name('showMovieById');

Route::get('/movie/{id}/edit', [MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movie/{id}', [MovieController::class, 'update'])->name('movie.update');

Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movies/', [MovieController::class, 'store'])->name('movies.store');

Route::delete('/movie/{id}', MovieController::class .'@destroy')->name('movie.destroy');

Route::get('/movies/letter/{char}', [MovieController::class, 'showMovieByChar']);

Route::get('/search/', [MovieController::class, 'search'])->name('search');

Route::get('/backoffice', [MovieController::class, 'backoffice'])->name('backoffice')->middleware(['password.confirm']);;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
