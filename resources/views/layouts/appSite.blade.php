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
            <h2>Quer fazer parte da nossa comunidade? Clique aqui e <a href="#">Cadastre sua van</a></h2>
        </div>
        <div class="header">
            <div class="container">
                <div class="row no-gutters">
                    <div class="logo col-6 col-lg-3"><a href="#"><img src="{{URL('/images/logo-guia-da-van.png')}}" alt="" class="img-fluid"></a></div>
                    <div class="menu_desktop col-9">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Quem somos</a></li>
                            <li><a href="#">Anuncie aqui</a></li>
                            <li><a href="#">Contato</a></li>
                            <li class="button_account"><img src="{{URL('/images/account.svg')}}" width=""> <a href="#">Acessar conta</a> | <a href="#">Criar conta</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="py-4">
        <section>
            <div class="bannerTop">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-8">
                            <div class="takeItem">
                                <div class="button_tag">
                                    <h2>Encontre sua van</h2>
                                </div>

                                <div class="title">
                                    <h2>Dê match em sua <span>carona aqui</span></h2>
                                </div>

                                <div class="description col-12 col-md-10 col-lg-9">No coding required to make customizations. The kive custinnuzer has everything you need.</div>

                                <div class="search">
                                    <div class="titleSearch">
                                        <h2>Busca Personalizada</h2>
                                    </div>
                                    <div class="formulario col-12 col-md-10">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="imagem"><img src="{{URL('/images/imagem_hand_mobile.png')}}" alt="" class="img-fluid"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

</body>

</html>