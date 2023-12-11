<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function showAllMovies(): string
    {
        return "Movie List";
    }

    public function showMovie(string $id): string
    {
        return 'Movie '.$id;
    }
}
