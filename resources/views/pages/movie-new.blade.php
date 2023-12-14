@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-4xl font-bold text-center mb-12">New Movie</h2>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('movies.store') }}" method="POST" novalidate>

            @csrf
            @method('POST')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" name="title" id="title" value="title here" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>Description</textarea>
            </div>

            <div class="mb-4">
                <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Year:</label>
                <textarea name="year" id="year" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>Year</textarea>
            </div>

            <div class="mb-4">
                <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
                <textarea name="genre" id="genre" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>Genre</textarea>
            </div>

            <div class="mb-4">
                <label for="actors" class="block text-gray-700 text-sm font-bold mb-2">Actors(s):</label>
                <textarea name="actors" id="actors" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>Actor</textarea>
            </div>

            <div class="mb-4">
                <label for="artwork" class="block text-gray-700 text-sm font-bold mb-2">Artwork:</label>
                <textarea name="artwork" id="artwork" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>Artwork url</textarea>
            </div>

            <button type="submit" class="bg-gray-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded mb-4">Save new movie</button>
            <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mb-4">
                Back
            </a>
        </form>

    </div>
@stop
