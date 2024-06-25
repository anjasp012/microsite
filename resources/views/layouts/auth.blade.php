<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('style')
</head>

@if (request()->routeIs('login'))

    <body style="background-image: url('/images/bg-masuk.png'); background-size: cover;min-height: 100vh">
    @elseif (request()->routeIs('register'))

        <body style="background-image: url('/images/bg-daftar.png'); background-size: cover;min-height: 100vh">
        @else

            <body style="background-image: url('/images/bg-hadiah.png'); background-size: cover;min-height: 100vh">
@endif
<div id="app">
    <main>
        @yield('content')
    </main>
</div>

@stack('script')
</body>

</html>
