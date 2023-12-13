@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-4xl font-bold text-center mb-12">Edit Movie</h2>

        <form action="{{ route('movie.update', $movie->id) }}" method="POST">

            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" name="title" id="title" value="{{ $movie->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $movie->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Year:</label>
                <textarea name="year" id="year" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $movie->year }}</textarea>
            </div>

            <div class="mb-4">
                <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
                <textarea name="genre" id="genre" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $movie->genre }}</textarea>
            </div>

            <div class="mb-4">
                <label for="actors" class="block text-gray-700 text-sm font-bold mb-2">Actors(s):</label>
                <textarea name="actors" id="actors" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $movie->actor }}</textarea>
            </div>

            <div class="mb-4">
                <label for="artwork" class="block text-gray-700 text-sm font-bold mb-2">Artwork:</label>
                <textarea name="artwork" id="artwork" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $movie->artwork }}</textarea>
            </div>

            <button type="submit" class="bg-gray-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded mb-4">Update Movie</button>
            <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mb-4">
                Back
            </a>
        </form>
    </div>
@stop
