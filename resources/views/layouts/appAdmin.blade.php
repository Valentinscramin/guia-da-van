<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ URL('/images/icon.png') }}">

    <!-- Scripts -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

{{-- route('track_home') --}}
{{-- route('user.index') --}}
{{-- route('admin.photos.index') --}}
{{-- route('announcement.index') --}}
{{-- route('faq.index') --}}
{{-- route('web_site_comment_approve') --}}

<body id="dashboard__body">
    <div class="content__dashboard" id="app">
        <div class="col-2 col-sm-1 col-xl-2 column_sidebar">
            <div class="sidebar">
                <div class="logo">
                    <a href="{{ route('user_home') }}"><img src="{{ URL('/images/logo-guia-da-van.png') }}"
                            alt="" class="img-fluid"></a>
                </div>
                <nav>
                    <ul>
                        <li id="dashboard"><a href="{{ route('admin_home') }}"><img
                                    src="{{ URL('/images/home_dashboard.svg') }}" alt="" class="img-fluid">
                                <span>Início</span></a></li>
                        <li id="trajetos"><a href="{{ route('track_home') }}"><img
                                    src="{{ URL('/images/search_van_dashboard.svg') }}" alt=""
                                    class="img-fluid"> <span>Trajetos</span></a></li>
                        <li id="usuarios"><a href="{{ route('user.index') }}"><img src="{{ URL('/images/user.svg') }}" alt="" class="img-fluid">
                                <span>Usuários</span></a></li>
                        <li id="anuncios"><a href="{{ route('announcement.index') }}"><img
                                    src="{{ URL('/images/anuncie_dashboard.svg') }}" alt="" class="img-fluid">
                                <span>Anúncios</span></a></li>
                        <li id="midias"><a href="{{ route('admin.photos.index') }}"><img
                                    src="{{ URL('/images/midias_dashboard.svg') }}" alt="" class="img-fluid">
                                <span>Mídias</span></a></li>
                        <li id="comentarios"><a href="{{ route('web_site_comment_approve') }}"><img
                                    src="{{ URL('/images/nos-avalie_dashboard.svg') }}" alt=""
                                    class="img-fluid"> <span>Comentarios sobre o site</span></a></li>
                        <li id="ajuda"><a href="{{ route('faq.index') }}"><img src="{{ URL('/images/help_dashboard.svg') }}"
                                    alt="" class="img-fluid"> <span>Ajuda</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-10 col-sm-11 col-xl-10 column_nav">
            <nav class="nav_top_dashboard navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="search_dashboard col-6">
                    <form action="">
                        <input type="text" placeholder="Faça sua busca aqui...">
                    </form>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
