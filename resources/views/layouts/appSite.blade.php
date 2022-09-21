<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Scripts --}}
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>

<body>
    <header>
        <h1 class="ocultar">Guia da Van</h1>
        <div class="top_header">
            <h2>Quer fazer parte da nossa comunidade? Clique aqui e <a href="/register">Cadastre sua van</a></h2>
        </div>
        <div class="header">
            <div class="container">
                <div class="row no-gutters">
                    <div class="logo col-6 col-lg-3"><a href="{{ route('home') }}"><img
                                src="{{ URL('/images/logo-guia-da-van.png') }}" alt="" class="img-fluid"></a>
                    </div>
                    <div class="menu_desktop col-9">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('quem_somos') }}">Quem somos</a></li>
                            <li><a href="{{ route('anuncie_aqui') }}">Anuncie aqui</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="{{ route('contato') }}">Contato</a></li>
                            @guest
                                <li class="button_account"><img src="{{ URL('/images/account.svg') }}" width=""> <a
                                        href="/login">Acessar conta</a> | <a href="/register">Criar conta</a>
                                </li>
                            @else
                                <li class="button_account"><img src="{{ URL('/images/account.svg') }}" width=""> <a
                                        href="/user"> Olá {{ Auth::user()->name }} </a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
    <footer>
        <div class="footer">
            <div class="takeFooter">
                <div class="container">
                    <div class="row no-gutters">

                        <div class="title">
                            <h2>Assine nossa <span>Newsletter</span></h2>
                        </div>
                        <div class="subtitle">
                            No coding required to make customizations. The kive custinnuzerhas everything you need.
                        </div>


                        <div class="col-12 endFooter">
                            <div class="logo col-8 col-md-4 col-lg-3"><img
                                    src="{{ URL('/images/logo-guia-da-van.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="menu_footer col-md-8 col-lg-9">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('quem_somos') }}">Quem somos</a></li>
                                    <li><a href="{{ route('anuncie_aqui') }}">Anuncie aqui</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                                    <li><a href="{{ route('contato') }}">Contato</a></li>

                                    @guest
                                        <li class="button_account"><img src="{{ URL('/images/account.svg') }}"
                                                width=""> <a href="/login">Acessar conta</a> | <a
                                                href="/register">Criar conta</a>
                                        </li>
                                    @else
                                        <li class="button_account"><img src="{{ URL('/images/account.svg') }}"
                                                width=""> <a href="/user"> Olá {{ Auth::user()->name }} </a>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="allRights">© 2022 <b>Guia da Van</b> copyrights. Todos os direitos reservados.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
