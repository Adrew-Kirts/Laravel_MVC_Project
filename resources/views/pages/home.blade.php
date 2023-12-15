@extends('layouts.default')

@section('content')

    <div class="absolute inset-0">
        <img src="https://variety.com/wp-content/uploads/2022/12/100-Greatest-Movies-Variety.jpg" class="w-full h-full object-cover" alt="Movie Background">
        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>
    <div class="relative">
        <div class="container mx-auto px-4 py-10 relative">
            <h2 class="text-6xl font-bold text-white text-center mb-12">Welcome to MovieDB</h2>
            <div class="flex flex-col items-center gap-8 mb-16 mt-56">
                <a href="/movies" class="bg-blue-900 hover:bg-blue-600 text-white font-bold py-2 px-16 rounded-lg text-lg transition duration-300">
                    Browse All Movies
                </a>
                <div class="text-white">
                    <p class="mb-4">Or search for a specific movie:</p>
                    <form action="{{ route('search') }}" method="GET" class="flex gap-4">
                        <input type="text" name="search" placeholder="title, description, ..." required class="px-4 py-2 rounded-md border-2 text-black border-blue-900 focus:border-blue-600 focus:outline-none"/>
                        <button type="submit" class="bg-blue-900 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md transition duration-300">Search</button>
                    </form>
                </div>
            </div>
            <div class="text-center text-white">
                <p>Or select a letter to view movies starting with that letter:</p>
            </div>
            <div class="flex justify-center gap-2 mb-12 pt-8">
                @foreach (range('A', 'Z') as $char)
                    <a href="{{ url('movies/letter', $char) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded transition duration-300">
                        {{ $char }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@stop
