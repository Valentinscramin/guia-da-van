@extends('layouts.appSite')

@section('content')
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

                            <div class="description col-12 col-md-10 col-lg-9">Selecione o tipo de serviço que você deseja.
                                Uma busca rápida e simples pela a melhor opção para você!</div>

                            <div class="search">
                                <div class="titleSearch">
                                    <h2>Busca Personalizada</h2>
                                </div>
                                <div class="formulario col-12 col-md-10">
                                    @include('site.filtro')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="imagem"><img src="{{ URL('/images/imagem_hand_mobile.png') }}" alt=""
                                class="img-fluid"></div>
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

                            <div class="btn_cadastre"><a href="/register">Cadastre-se agora!</a></div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-7">
                            <img src="{{ URL('/images/van_3d.png') }}" alt="" class="img-fluid">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (!is_null($websitecomments))
        <section>
            <div class="depoiments">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-5 column_first">
                            <img src="{{ URL('/images/mobile_image.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-12 col-lg-7 column_second">
                            <div class="button_tag">
                                <h2>Depoimentos</h2>
                            </div>
                            <div class="title">
                                <h3>O que estão <span>comentando?</span></h3>
                            </div>

                            <div class="takeComments">
                                @foreach ($websitecomments as $eachComment)
                                    <div class="itemComments">
                                        <div class="col-12">
                                            <div class="text">{{ $eachComment->comment }}</div>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="name">{{ $eachComment->user->name }}</div>
                                            <div class="function">Estudante</div>
                                        </div>
                                        <div class="col-12 col-md-4"><img src="{{ URL('/images/stars.png') }}"
                                                alt="" class="img-fluid"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="anuncio">
                                @foreach ($announcement as $eachAnnuncement)
                                    <img src="{{ URL('/storage/' . $eachAnnuncement->announcement_photos[0]->arquivo) }}"
                                        alt="" class="img-fluid">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (!is_null($faq))
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
                                @foreach ($faq as $eachFaq => $value)
                                    <li class="col-12 col-md-6">
                                        <div class="takeItem  col-12 col-md-11">
                                            <div class="title col-12"><button data-id="1">{{ $value->question }}
                                                    <span><img src="{{ URL('/images/arrow.svg') }}" alt=""
                                                            class="img-fluid"></span></button></div>
                                            <div class="content content_1 col-12">{{ $value->answer }}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <script>
        jQuery("#home").addClass("activeMenu");
    </script>
@endsection
