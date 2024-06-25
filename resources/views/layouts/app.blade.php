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

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="/images/home.png" width="30px" height="30px" alt="">
                </a>

                <ul class="nav ms-auto gap-1">
                    @auth
                        <li class="nav-item">
                            <a class="btn btn-secondary btn-sm fw-bold btn-register dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Postingan saya</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Log out</a></li>
                            </ul>

                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-secondary btn-sm fw-bold btn-register"
                                href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-success btn-sm fw-bold text-white px-3 btn-login"
                                aria-disabled="true">Log
                                in</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    @stack('script')
</body>

</html>
