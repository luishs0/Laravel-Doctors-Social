<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @vite(['resources/js/mychart.js'])
    
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm adm-header">
            <div class="container">

                <img class="logo-img ms-1" src="http://127.0.0.1:8000/storage/images/logo.jpg" alt="">
                {{-- config('app.name', 'Laravel') --}}


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li> --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost:5174">{{ __('HOME') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost:5174/about-us">{{ __('ABOUT US') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost:5174/services">{{ __('SERVICES') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost:5174/contact">{{ __('CONTACT') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ strtoupper(Auth::user()->name) }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}"> Dashboard </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid vh-100 ms_nav">
            <div class="row h-100">

                {{-- Sidebar --}}
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-block nav-dash sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav ms-2 flex-md-column text-uppercase ps-2 mt-4">

                            <li class="nav-item mt-2 {{ strpos(Route::currentRouteName(), 'dashboard') ? 'bg-white' : '' }}">
                                <a class="nav-link bd-radius text-dark text-decoration-none" href="{{ route('admin.dashboard', auth()->user()->id) }}">
                                    <i class="pe-3 fa-solid fa-table-columns"></i>
                                    dashboard
                                </a>
                            </li>

                            <li class="nav-item mt-2 {{ strpos(Route::currentRouteName(), 'profiles') ? 'bg-white' : '' }}">
                                <a class="nav-link text-dark text-decoration-none" href="{{ route('admin.profiles.show', auth()->user()->id) }}">
                                    <i class="pe-3 fa-solid fa-user"></i>
                                    Profile
                                </a>
                            </li>

                            <li class="nav-item mt-2 {{ strpos(Route::currentRouteName(), 'sponsor')? 'bg-white' : '' }}">
                                <a class="nav-link text-dark text-decoration-none" href="{{ route('admin.sponsor') }}">
                                    <i class="pe-3 fa-solid fa-dollar-sign"></i>
                                    sponsors
                                </a>
                            </li>

                            <li class="nav-item mt-2 {{ strpos(Route::currentRouteName(), 'message') ? 'bg-white' : '' }}">
                                <a class="nav-link text-dark text-decoration-none" href="{{ route('admin.message') }}">
                                    <i class="pe-3 fa-solid fa-message"></i>
                                    message
                                </a>
                            </li>

                            <li class="nav-item mt-2 {{ strpos(Route::currentRouteName(), 'feedback') ? 'bg-white' : '' }}">
                                <a class="nav-link text-dark text-decoration-none" href="{{ route('admin.feedback') }}">
                                    <i class="pe-3 fa-regular fa-pen-to-square"></i>
                                    <span class="">
                                        feedback
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
                {{-- /Sidebar --}}

                <main class="col-md-9 ms-sm-auto col-lg-10  px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>

</body>
