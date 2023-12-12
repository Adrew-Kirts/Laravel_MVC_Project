@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-3xl font-bold mb-10 text-center text-gray-800">
            All Movies
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($movies as $movie)
                <a href="{{ url('movie', $movie->id) }}" class="block">
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-200">
                        <img src="{{ $movie->artwork }}" alt="{{ $movie->title }}" class="w-full h-80 object-cover transform transition duration-500
                                hover:scale-110">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">{{ $movie->title }}</h3>
                            <p class="text-sm text-gray-600 mb-4">Genre: {{ $movie->genre }}</p>
                            <p class="text-gray-700 text-base italic min-h-[50px]">Starring: {{ Str::limit($movie->actor, 50) }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
{{--        </div>--}}
{{--        <div class="mt-6">--}}
{{--            {{ $movies->links() }}--}}
{{--        </div>--}}
{{--    </div>--}}
@stop
