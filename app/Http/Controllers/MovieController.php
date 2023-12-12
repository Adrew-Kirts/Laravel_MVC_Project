<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * Show all application users.
     */
    public function index(): View
    {
        return view('pages.movies-list', [
            'movies' => DB::table('movies')->paginate(10)
        ]);
    }

    public function show($id): View
    {
        return view('pages.movie-details', [
            'movie' => Movie::findOrFail($id)
        ]);
    }
}
