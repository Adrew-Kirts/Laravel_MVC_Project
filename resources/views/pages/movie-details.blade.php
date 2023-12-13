@extends('layouts.default')

@section('content')

    <div class="relative">

        <div class="fixed inset-0 bg-cover bg-center" style="background-image: url('{{ $movie->artwork }}');"></div>
        <div class="fixed inset-0 bg-black opacity-50"></div>

        <div class="container mx-auto px-4 py-28 mt-16 relative">

            <div class="bg-white bg-opacity-70 rounded-xl p-6 shadow-lg">
                <div class="flex flex-wrap md:flex-nowrap">

                    <div class="w-1/4 ">
                        <img src="{{ $movie->artwork }}" alt="{{ $movie->title }}" class="rounded-lg shadow-lg w-full h-auto">
                    </div>

                    <div class="w-full md:w-3/4 lg:w-4/5 xl:w-5/6 md:pl-6">
                        <h2 class="text-4xl font-bold mb-2">{{ $movie->title }} ({{ $movie->year }})</h2>
                        <p class="text-lg text-gray-600 mb-1">Genre: {{ $movie->genre }}</p>
                        <p class="text-lg text-gray-800 mb-1 pt-4">Description</p>

                        <div id="description" class="bg-gray-100 bg-opacity-70 rounded-2xl p-3 max-h-24 overflow-hidden cursor-pointer" onclick="toggleDescription()">
                            <p class="text-gray-700 italic">{{ $movie->description }}</p>
                        </div>
                        <p id="expandMessage" class="text-sm text-gray-600 mb-1 text-opacity-100">Click to expand</p>

                        <p class="text-lg text-gray-800 mb-1 pt-4">Starring</p>
                        <div class="bg-gray-100 bg-opacity-70 rounded-2xl p-3">
                            <p class="text-gray-700 italic">{{ $movie->actor }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mb-4">
                Back
            </a>
        </div>
    </div>

    <script>
        function toggleDescription() {
            var description = document.getElementById('description');
            var expandMessage = document.getElementById('expandMessage');
            if (description.classList.contains('max-h-24')) {
                description.classList.remove('max-h-24');
                description.classList.add('max-h-none');
                expandMessage.classList.remove('text-opacity-100');
                expandMessage.classList.add('text-opacity-0');
            } else {
                description.classList.remove('max-h-none');
                description.classList.add('max-h-24');
                expandMessage.classList.remove('text-opacity-0');
                expandMessage.classList.add('text-opacity-100');
            }
        }
    </script>
@stop
