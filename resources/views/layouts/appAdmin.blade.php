<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="content__dashboard" id="app">
        <div class="col-2 col-sm-1 col-xl-2">
            <div class="sidebar">
                <div class="logo">
                    <a href="{{ route('user_home') }}"><img src="{{ URL('/images/logo-guia-da-van.png') }}" alt="" class="img-fluid"></a>
                </div>
                <nav>
                    <ul>
                        <li class="active_dashboard"><a href="#"><img src="{{ URL('/images/home_dashboard.svg') }}" alt="" class="img-fluid"> <span>Dashboard</span></a></li>
                        <li><a href="#"><img src="{{ URL('/images/search_van_dashboard.svg') }}" alt="" class="img-fluid"> <span>Buscar Van</span></a></li>
                        <li><a href="#"><img src="{{ URL('/images/van_dashboard.svg') }}" alt="" class="img-fluid"> <span>Minha Frota</span></a></li>
                        <li><a href="#"><img src="{{ URL('/images/chat_dashboard.svg') }}" alt="" class="img-fluid"> <span>Chat</span></a></li>
                        <li><a href="#"><img src="{{ URL('/images/midias_dashboard.svg') }}" alt="" class="img-fluid"> <span>Mídias</span></a></li>
                    </ul>
                </nav>
                <nav class="more_options">
                    <ul>
                        <li><a href="#"><img src="{{ URL('/images/settings_dashboard.svg') }}" alt="" class="img-fluid"> <span>Configurações</span></a></li>
                        <li><a href="#"><img src="{{ URL('/images/anuncie_dashboard.svg') }}" alt="" class="img-fluid"> <span>Anuncie aqui</span></a></li>
                        <li><a href="#"><img src="{{ URL('/images/nos-avalie_dashboard.svg') }}" alt="" class="img-fluid"> <span>Nos avalie</span></a></li>
                        <li><a href="#"><img src="{{ URL('/images/help_dashboard.svg') }}" alt="" class="img-fluid"> <span>Ajuda</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-10 col-sm-11 col-xl-10">
            <nav class="nav_top_dashboard navbar navbar-expand-md navbar-light bg-white shadow-sm col-11">
                <div class="container">
                    <div class="search_dashboard col-6">
                        <form action="">
                            <input type="text" placeholder="Faça sua busca aqui...">
                        </form>
                    </div>
                    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                        <div class="container">
                            <a class="navbar-brand" href="{{ route('admin_home') }}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav me-auto">

                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                    @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @endif

                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                    @endif
                                    @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                            <a class="dropdown-item" href="{{ route('track_home') }}" role="button"> Track </a>
                                            <a class="dropdown-item" href="{{ route('user.index') }}" role="button"> Users </a>
                                            <a class="dropdown-item" href="{{ route('admin.photos.index') }}" role="button">
                                                Photos </a>
                                            <a class="dropdown-item" href="{{ route('announcement.index') }}" role="button">
                                                Anuncios </a>
                                            <a class="dropdown-item" href="{{ route('faq.index') }}" role="button">
                                                Cadastro Faq </a>

                                            <a class="dropdown-item" href="{{ route('web_site_comment_approve') }}" role="button">
                                                Web Site Comments </a>

                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
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

                    <main>
                        @yield('content')
                    </main>
                </div>
            </nav>
        </div>
</body>

</html>