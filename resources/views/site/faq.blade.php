@extends('layouts.appSite')

@section('content')
    <section>
        <div class="bannerTop">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12 col-lg-8">
                        <div class="takeItem">
                            <div class="button_tag">
                                <h2>Tire suas dúvidas</h2>
                            </div>

                            <div class="title">
                                <h2>Encontre a <span>respostas</span> para as suas <span>dúvidas</span></h2>
                            </div>

                            <div class="description col-12 col-md-10 col-lg-9">Nossa equipe já solucionou algumas dúvidas de
                                nossos clientes, talvez a sua dúvida já esteja respondida aqui. Caso precise nos envie uma
                                mensagem no formulário de contato!</div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="imagem" style="width: 40%;"> <img src="{{ URL('/images/faq.jpg') }}" alt=""
                                class="img-fluid"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="faq default_page">
            <div class="container">
                <div class="row no-gutters">

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


    <script>
        jQuery("#faq").addClass("activeMenu");
    </script>
@endsection
