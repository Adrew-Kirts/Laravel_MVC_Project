<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function index(): JsonResponse
    {
        $movies = Movie::with('genre')->get();
        return response()->json($movies);
    }

    public function showMovieById($id): JsonResponse
    {
        $movie = Movie::findOrFail($id);
        return response()->json($movie);
    }

    public function store(StoreMovieRequest $request): JsonResponse
    {
        $genre = Genre::firstOrCreate(['name' => $request->input('genre')]);

        $movie = Movie::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'year' => $request->input('year'),
            'genre_id' => $genre->id,
            'actor' => $request->input('actor'),
            'artwork' => $request->input('artwork'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Movie created successfully',
            'data' => $movie
        ]);
    }

    public function update(StoreMovieRequest $request, $id): JsonResponse
    {
        $movie = Movie::findOrFail($id);

        if ($request->has('genre')) {
            $genre = Genre::firstOrCreate(['name' => $request->input('genre')]);
            $request->merge(['genre_id' => $genre->id]);
        }

        $movie->update($request->only(['title', 'description', 'year', 'genre_id', 'actor', 'artwork']));

        return response()->json([
            'success' => true,
            'message' => 'Movie updated successfully',
            'data' => $movie
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'success' => false,
                'message' => 'Movie not found'
            ], 404);
        }

        $movie->delete();

        return response()->json([
            'success' => true,
            'message' => 'Movie deleted successfully'
        ], 200);
    }
}
