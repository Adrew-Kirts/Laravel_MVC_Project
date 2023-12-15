@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
            @foreach ($movies as $movie)
                <a href="{{ route('showMovieById', ['id'=> $movie->id]) }}" class="block">
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-200">
                        <img src="{{ $movie->artwork }}" alt="{{ $movie->title }}" class="w-full h-80 object-cover transform transition duration-500 hover:scale-110">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">{{ $movie->title }}</h3>
                            <p class="text-sm text-gray-600 mb-4">Genre: {{ $movie->genre->name ?? 'Unknown' }}</p>
                            <p class="text-gray-700 text-base italic line-clamp-2">Starring:
                                @forelse ($movie->actors as $actor)
                                    {{ $loop->first ? '' : ', ' }}
                                    {{ $actor->name }}
                                @empty
                                    Not Available
                                @endforelse
                            </p>

                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="flex justify-between items-center mt-4">
            @if (!$movies->onFirstPage())
                <a href="{{ $movies->previousPageUrl() }}" class="text-base font-medium hover:text-blue-500">
                    Previous Page
                </a>
            @else
                <div></div>
            @endif

            <span>Page {{ $movies->currentPage() }} of {{ $movies->lastPage() }}</span>

            @if ($movies->hasMorePages())
                <a href="{{ $movies->nextPageUrl() }}" class="text-base font-medium hover:text-blue-500">
                    Next Page
                </a>
            @else
                <div></div>
            @endif
        </div>
    </div>
@stop
