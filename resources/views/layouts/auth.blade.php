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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/vendor/smaxXqube/css/style.css"> --}}
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
{{--
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script> --}}
@stack('script')
</body>

</html>
