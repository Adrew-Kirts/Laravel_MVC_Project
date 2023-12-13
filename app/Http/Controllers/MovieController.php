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
            ->paginate(10);

        return view('pages.movies-list', [
            'movies' => $movies
        ]);
    }

    public function create() :View
    {
        return view('pages.movie-new');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'year' => 'required|digits:4|integer|min:1900',
            'genre' => 'required',
            'artwork' => 'required',
        ]);
        Movie::create($request->all());
        return redirect()->route('backoffice')->with('success', 'Movie created successfully');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('pages.movie-edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'year' => 'required|digits:4|integer|min:1900',
            'genre' => 'required',
            'artwork' => 'required',
        ]);
        $movie = Movie::findOrFail($id);
        $movie -> update($request->all());
        return redirect()->route('backoffice')->with('success', 'Movie updated successfully');
    }

    public function destroy($id)
    {
       $movie = Movie::find($id);
       $movie->delete();
       return redirect()->route('backoffice')->with('success', 'Movie deleted successfully');
    }

}

