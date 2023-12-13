@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-4xl font-bold text-center mb-12">Backoffice</h2>

        <!-- Add Movie Button -->
{{--        <a href="{{ route('movies.create') }}" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">--}}
{{--            Add Movie--}}
{{--        </a>--}}

        <!-- Movies Table -->
        <table class="min-w-full leading-normal">
            <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Title
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>

                @foreach ($movies as $movie)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $movie->title }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
{{--                        <a href="{{ route('movies.edit', $movie->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>--}}
                        <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
