{{--@extends('layouts.default')--}}

{{--@section('content')--}}
{{--{{ $movie }}--}}
{{--@stop--}}

@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-4 py-28">
        <div class="flex flex-wrap md:flex-nowrap">
            <div class="w-full md:w-1/3 lg:w-1/4 xl:w-1/5 mb-4 md:mb-0">
                <img src="{{ $movie->artwork }}" alt="{{ $movie->title }}" class="rounded-lg shadow-lg w-full h-auto">
            </div>

            <div class="w-full md:w-2/3 lg:w-3/4 xl:w-4/5 md:pl-6">
                <h2 class="text-4xl font-bold mb-2">{{ $movie->title }} ({{ $movie->year }})</h2>
                <p class="text-lg text-gray-600 mb-1">Genre: {{ $movie->genre }}</p>
                <p class="text-lg text-gray-800 mb-1 pt-4">Description</p>
                <div class="bg-gray-100 rounded-l-2xl p-2"><p class="text-gray-700 mt-4 italic">{{ $movie->description }}</p></div>
            </div>
        </div>
    </div>
@stop
