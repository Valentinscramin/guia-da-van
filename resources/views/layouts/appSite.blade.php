<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ URL('/images/icon.png') }}">

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
            @if (Auth::check())
            <h2>Deseja gerenciar ou cadastrar sua van? Clique aqui para acessar <a href="{{ route('van.index') }}">Minha Frota</a></h2>
            @else
            <h2>Quer fazer parte da nossa comunidade? Clique aqui para <a href="/register">Cadastrar sua van</a></h2>
            @endif
        </div>
        <div class="header">
            <div class="container">
                <div class="row no-gutters">
                    <div class="logo col-6 col-lg-3"><a href="{{ route('home') }}"><img src="{{ URL('/images/logo-guia-da-van.png') }}" alt="" class="img-fluid"></a>
                    </div>
                    <div class="menu_desktop col-9">
                        <ul>
                            <li id="home"><a href="{{ route('home') }}">Home</a></li>
                            <li id="quem-somos"><a href="{{ route('quem_somos') }}">Quem somos</a></li>
                            <li id="anuncie"><a href="{{ route('anuncie_aqui') }}">Anuncie aqui</a></li>
                            <li id="faq"><a href="{{ route('faq') }}">FAQ</a></li>
                            <li id="contato"><a href="{{ route('contato') }}">Contato</a></li>
                            @guest
                            <li class="button_account"><img src="{{ URL('/images/account.svg') }}" width=""> <a href="/login">Acessar conta</a> | <a href="/register">Criar conta</a>
                            </li>
                            @else
                            <li class="button_account"><img src="{{ URL('/images/account.svg') }}" width=""> <a href="/user"> Olá {{ Auth::user()->name }} </a>
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


        <section>
            <div class="social_media">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="button_tag">
                            <h2>Redes socias</h2>
                        </div>

                        <div class="title">
                            <h3>Junte-se a <span>nós</span></h3>
                        </div>

                        <div class="all_media col-10 col-md-7 col-lg-10">
                            <div class="itemSocial col-12 col-lg-4">
                                <div class="col-12 col-sm-4">
                                    <div class="icon"><a href="#" target="_blank"><img src="{{ URL('/images/facebook.svg') }}" alt="" class="img-fluid"></a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <div class="title">
                                        <a href="#
                                    " target="_blank">
                                            <h2>Facebook</h2>
                                        </a>
                                    </div>
                                    <div class="description"><a href="#" target="_blank">Veja nossas últimas
                                            atualizações.</a></div>
                                </div>
                            </div>
                            <div class="itemSocial col-12 col-lg-4">
                                <div class="col-12 col-sm-4">
                                    <div class="icon"><a href="#" target="_blank"><img src="{{ URL('/images/instagram.svg') }}" alt="" class="img-fluid"></a></div>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <div class="title">
                                        <a href="#" target="_blank">
                                            <h2>Instagram</h2>
                                        </a>
                                    </div>
                                    <div class="description"><a href="#" target="_blank">Veja nossas últimas
                                            atualizações.</a></div>
                                </div>
                            </div>
                            <div class="itemSocial col-12 col-lg-4">
                                <div class="col-12 col-sm-4">
                                    <div class="icon"><a href="#" target="_blank"><img src="{{ URL('/images/whatsapp.svg') }}" alt="" class="img-fluid"></a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <div class="title">
                                        <a href="#" target="_blank">
                                            <h2>Whatsapp</h2>
                                        </a>
                                    </div>
                                    <div class="description"><a href="#" target="_blank">Entre em contato conosco.</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
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
                            Informe seu nome e e-mail e fique por dentro de todas as novidades!
                        </div>


                        <div class="col-12 endFooter">
                            <div class="logo col-8 col-md-4 col-lg-3"><img src="{{ URL('/images/logo-guia-da-van.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="menu_footer col-md-8 col-lg-9">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('quem_somos') }}">Quem somos</a></li>
                                    <li><a href="{{ route('anuncie_aqui') }}">Anuncie aqui</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                                    <li><a href="{{ route('contato') }}">Contato</a></li>

                                    @guest
                                    <li class="button_account"><img src="{{ URL('/images/account.svg') }}" width=""> <a href="/login">Acessar conta</a> | <a href="/register">Criar conta</a>
                                    </li>
                                    @else
                                    <li class="button_account"><img src="{{ URL('/images/account.svg') }}" width=""> <a href="/user"> Olá {{ Auth::user()->name }} </a>
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