<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * Show all movies.
     */
    public function index(): View
    {
        return view('pages.movies-list', [
            'movies' => DB::table('movies')->paginate(8)
        ]);
    }

    public function backoffice(): View
    {
        return view('pages.backoffice', [
            'movies' => DB::table('movies')->get()
        ]);
    }

    /**
     * Show movie by id.
     */
    public function showMovieById($id): View
    {
        return view('pages.movie-details', [
            'movie' => Movie::findOrFail($id)
        ]);
    }
    /**
     * Show movie titles beginning with char.
     */
    public function showMovieByChar($char): View
    {
        $movies = DB::table('movies')
            ->where('title', 'like', $char . '%')
            ->get();

        return view('pages.movies-list', [
            'movies' => $movies
        ]);
    }

    public function create()
    {
        // Code to show a form for creating a new resource
    }

    public function edit($id)
    {
        // Code to show a form for editing the specified resource
    }

    public function update(Request $request, $id)
    {
        // Code to update the specified resource in storage
    }

    public function destroy($id)
    {
       $movie = Movie::find($id);
       $movie->delete();
       return redirect()->route('backoffice')->with('succes', 'Movie deleted successfully');
    }

}

