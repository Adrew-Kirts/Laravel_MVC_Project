<x-app-layout>
    <x-slot name="header">
        <!-- Navigation Links -->
        <nav class="space-x-4">
            <a href="/movies" class="text-gray-600 hover:text-gray-800">Movie List</a>
{{--            <a href="{{ route('allMovies') }}" class="text-gray-600 hover:text-gray-800">Movie list</a>--}}
            @auth
                <a href="{{ route('backoffice') }}" class="text-gray-600 hover:text-gray-800">Backoffice</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-gray-800">Logout</button>
                </form>
            @endauth
        </nav>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
