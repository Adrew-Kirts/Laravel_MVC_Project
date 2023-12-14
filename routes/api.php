<?php

use App\Http\Controllers\Api\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/movies', [MovieController::class, 'index']);

Route::get('/movie/{id}', [MovieController::class, 'showMovieById']);

Route::post('/movies/', [MovieController::class, 'store']);

Route::put('/movie/{id}', [MovieController::class, 'update']);

Route::delete('/movie/{id}', [MovieController::class, 'destroy']);
