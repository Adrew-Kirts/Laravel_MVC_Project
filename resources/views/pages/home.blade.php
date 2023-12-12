@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <!-- Title -->
        <h2 class="text-4xl font-bold text-center mb-12">Welcome to MovieDB</h2>

        <!-- Navigation Buttons -->
        <div class="flex justify-center gap-8 mb-16">
            <a href="/movies" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-4 px-8 rounded-lg text-lg transition duration-300">
                Browse Movies List
            </a>
        </div>

        <!-- Alphabet Bar -->
        <div class="flex justify-center gap-2 mb-12">
            @foreach (range('A', 'Z') as $char)
                <a href="{{ url('movies/letter', $char) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded transition duration-300">
                    {{ $char }}
                </a>
            @endforeach
        </div>

        <!-- Movies List Placeholder -->
        <div class="text-center text-gray-700">
            <p>Select a letter to view movies starting with that letter.</p>
        </div>
    </div>
@stop
