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
                            <li><a href="#">FAQ</a></li>
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

        <section>
            <div class="cadastre_se">
                <div class="takeCadastrese">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col-12 col-lg-6 col-xl-5">
                                <div class="button_tag button_tag_white">
                                    <h2>Cadastre-se</h2>
                                </div>
                                <div class="title">
                                    <h3>Porque cadastrar a <span>sua van?</span></h3>
                                </div>
                                <div class="text">Existem muitos benefícios em ter sua van cadastrada em nosso
                                    sistema de busca, mas o principal deles é aumentar a sua cartela
                                    de clientes! Com a nossa ajuda, você vai ter mais pessoas
                                    solicitando os seus serviços.</div>

                                <div class="btn_cadastre"><a href="#">Cadastre-se agora!</a></div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-7">
                                <img src="{{URL('/images/van_3d.png')}}" alt="" class="img-fluid">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="depoiments">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-5 column_first">
                            <img src="{{URL('/images/mobile_image.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="col-12 col-lg-7 column_second">
                            <div class="button_tag">
                                <h2>Depoimentos</h2>
                            </div>
                            <div class="title">
                                <h3>O que estão <span>comentando?</span></h3>
                            </div>

                            <div class="takeComments">
                                <div class="itemComments">
                                    <div class="col-12">
                                        <div class="text">Existem muitos benefícios em ter sua van cadastrada em nosso
                                            sistema de busca, mas o principal deles é aumentar a sua cartela
                                            de clientes! Com a nossa ajuda, você vai ter mais pessoas
                                            solicitando os seus serviços.</div>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="name">Jhon Doe</div>
                                        <div class="function">Estudante</div>
                                    </div>
                                    <div class="col-12 col-md-4"><img src="{{URL('/images/stars.png')}}" alt="" class="img-fluid"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="anuncio">
                                <img src="{{URL('/images/anuncio.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="faq">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="button_tag">
                            <h2>FAQ</h2>
                        </div>

                        <div class="title">
                            <h3>Precisa de <span>ajuda?</span></h3>
                        </div>

                        <div class="duvidas col-12 col-lg-10">
                            <ul>
                                <li class="col-12 col-md-6">
                                    <div class="title">How Benefit That I Got When Choose ?</div>
                                    <div class="content"></div>
                                </li>
                                <li class="col-12 col-md-6">
                                    <div class="title">How Benefit That I Got When Choose ?</div>
                                    <div class="content"></div>
                                </li>
                                <li class="col-12 col-md-6">
                                    <div class="title">How Benefit That I Got When Choose ?</div>
                                    <div class="content"></div>
                                </li>
                                <li class="col-12 col-md-6">
                                    <div class="title">How Benefit That I Got When Choose ?</div>
                                    <div class="content"></div>
                                </li>
                                <li class="col-12 col-md-6">
                                    <div class="title">How Benefit That I Got When Choose ?</div>
                                    <div class="content"></div>
                                </li>
                                <li class="col-12 col-md-6">
                                    <div class="title">How Benefit That I Got When Choose ?</div>
                                    <div class="content"></div>
                                </li>
                                <li class="col-12 col-md-6">
                                    <div class="title">How Benefit That I Got When Choose ?</div>
                                    <div class="content"></div>
                                </li>
                                <li class="col-12 col-md-6">
                                    <div class="title">How Benefit That I Got When Choose ?</div>
                                    <div class="content"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

                        <div class="all_media col-12">
                            <div class="itemSocial">
                                <div class="col-12 col-sm-4"><img src="{{URL('/images/facebook.svg')}}" alt="" class="img-fluid"></div>
                                <div class="col-12 col-sm-8">
                                    <div class="title">
                                        <h2>Facebook</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="itemSocial">
                                <div class="col-12 col-sm-4"><img src="{{URL('/images/instagram.svg')}}" alt="" class="img-fluid"></div>
                                <div class="col-12 col-sm-8">
                                    <div class="title">
                                        <h2>Instagram</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="itemSocial">
                                <div class="col-12 col-sm-4"><img src="{{URL('/images/whatsapp.svg')}}" alt="" class="img-fluid"></div>
                                <div class="col-12 col-sm-8">
                                    <div class="title">
                                        <h2>Whatsapp</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>