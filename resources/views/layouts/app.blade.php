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
</head>
<body>
    <div id="app">
        @props(['bgcolor' => '#B8001F', 'textcolor' => '#FFFFFF'])

        <nav class="navbar navbar-expand-lg sticky-top shadow-sm" style="background-color: {{ $bgcolor }}; padding: 0.5rem 0;">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <img src="{{ Vite::asset('resources/images/hamburguer.png') }}" width="40" height="40" alt="Logo" class="d-inline-block align-text-top">
                    <div class="d-flex flex-column ms-2">
                        <img src="{{ Vite::asset('resources/images/fastbite.png') }}" height="24" alt="FastBite Logo">
                        <img src="{{ Vite::asset('resources/images/subtitle.png') }}" height="12" alt="Subtitle">
                    </div>
                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                    <!-- Barra de búsqueda centrada -->
                    <div class="d-flex justify-content-center flex-grow-1 mx-3">
                        <form class="w-100" role="search" style="max-width: 500px;">
                            <div class="input-group">
                                <input class="form-control rounded-pill border-0 shadow-sm" type="search" placeholder="Buscar productos..." aria-label="Buscar" style="padding: 0.5rem 1rem; font-size: 0.9rem;">
                                <button type="submit" class="btn btn-link text-dark position-absolute end-0 top-50 translate-middle-y me-2" aria-label="Buscar" style="width: 36px; height: 36px; display:flex; align-items:center; justify-content:center; padding: 0;">
                                    <img src="{{ Vite::asset('resources/images/search.png') }}" width="20" height="20" alt="Search">
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Dropdown del usuario alineado a la derecha -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                            <div class="d-flex align-items-center bg-dark bg-opacity-25 rounded-pill px-3 py-1">
                                <img src="{{ Vite::asset('resources/images/user.png') }}" width="32" height="32" alt="User" class="rounded-circle" />
                                <span class="ms-2 text-white fw-semibold" style="font-size:0.9rem;">
                                    {{ Auth::user()->name }}
                                </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="margin-top: 8px;">
                            <li>
                                <div class="dropdown-header text-muted">
                                    <small>{{ Auth::user()->email }}</small>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <!-- Formulario para cerrar sesión -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger" style="cursor: pointer;">
                                        <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth
                    
                    @guest
                    <!-- Authentication Links para usuarios no autenticados -->
                    <div class="d-flex align-items-center ms-auto">
                        @if (Route::has('login'))
                        <div class="me-3">
                            <a class="nav-link text-white fs-5" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                        </div>
                        @endif

                        @if (Route::has('register'))
                        <div>
                            <a class="nav-link text-white fs-5" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </div>
                        @endif
                    </div>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>