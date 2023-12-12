<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class="bg-gray-200">
<div class="flex flex-col min-h-screen">
    <header>
        @include('includes.header')
    </header>
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            @yield('content')
        </div>
    </main>
    <footer>
        @include('includes.footer')
    </footer>
</div>
</body>
</html>
