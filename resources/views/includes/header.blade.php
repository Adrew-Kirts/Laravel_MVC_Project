{{--<div class="bg-gray-800 shadow-lg">--}}
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--        <div class="flex justify-between items-center py-3 md:justify-start md:space-x-10">--}}
{{--            <div class="flex justify-start lg:w-0 lg:flex-1">--}}
{{--                <a href="/" class="text-white text-lg font-semibold hover:text-blue-200">MovieDB</a>--}}
{{--            </div>--}}
{{--            <nav class="md:flex space-x-10">--}}
{{--                <a href="/movies" class="text-base font-medium text-white hover:text-blue-200">Movie List</a>--}}
{{--            </nav>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="bg-gray-800 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-3 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="/" class="text-white text-lg font-semibold hover:text-blue-200">MovieDB</a>
            </div>
            <nav class="md:flex space-x-10">
                <a href="/movies" class="text-base font-medium text-white hover:text-blue-200">Movie List</a>
                @guest
                    <a href="{{ route('login') }}" class="text-base font-medium text-white hover:text-blue-200">Login</a>
                    <a href="{{ route('register') }}" class="text-base font-medium text-white hover:text-blue-200">Register</a>
                @endguest
                @auth
                    <a href="{{ route('dashboard') }}" class="text-base font-medium text-white hover:text-blue-200">Dashboard</a>
                    <a href="{{ route('backoffice') }}" class="text-base font-medium text-white hover:text-blue-200">Backoffice</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-base font-medium text-white hover:text-blue-200">Logout</button>
                    </form>
                @endauth
            </nav>
        </div>
    </div>
</div>
