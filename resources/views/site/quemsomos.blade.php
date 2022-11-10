@extends('layouts.appSite')

@section('content')
<section>
    <div class="bannerTop">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-lg-8">
                    <div class="takeItem">
                        <div class="button_tag">
                            <h2>O que fazemos?</h2>
                        </div>

                        <div class="title">
                            <h2>A procura por vans de <span>forma simples e eficaz</span></h2>
                        </div>

                        <div class="description col-12 col-md-10 col-lg-9">Guia da Van é um sistema desenvolvido para facilitar a oferta e procura por serviços com Vans através do cadastro pelos próprios proprietários de uma forma muito simples.</div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="imagem" style="position: absolute; right: 0; text-align: right; z-index: 2;"><img src="{{ URL('/images/van_quem_somos.png') }}" alt="" class="img-fluid"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="quem_somos">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12 col-lg-6">
                <div class="button_tag button_tag_white">
                    <h2>Quem somos?</h2>
                </div>
                <div class="title">
                    <h3>Seu Guia <span>da Van</span></h3>
                </div>
                <div class="text">
                    <p>Todos os dias, vemos uma grande quantidade de vans circulando em nossa região,
                        mas quando precisamos de uma van para um transporte escolar, para um evento
                        ou para transporte de alguma mercadoria, na maioria das vezes, dependemos da
                        indicação de um amigo ou procuramos em canais de anúncios.</p>

                    <p>O mesmo acontece com os proprietários das vans, sempre a procura de alunos que
                        estudam nas escolas que ele atende ou alguém que procura o serviço de transporte
                        que ele oferece, anunciando em jornais, colocando cartazes em avenidas, anunciando
                        nas mídias sociais ou nos próprios veículos.</p>

                    <p>O maior problema é colocar a van que você procura no local que você está procurando.</p>

                    <p>Foi pensando nisso que o Guia da Van foi desenvolvido. Um sistema de oferta e procura
                        por serviços executados com vans para te indicar exatamente a van que você procura,
                        economizando tempo e evitando preocupações. Você poderá até localizar uma van em
                        uma região que você ainda não conhece, como o endereço de seu novo emprego ou
                        sua nova residência.</p>

                    <p>Para você que é proprietário de van, nosso sistema facilita a divulgação de seu serviço
                        com um custo muito baixo. Acesse a página de cadastro e seja um parceiro Guia da Van.
                        Com apenas um cadastro você pode divulgar todos os trajetos que faz, para várias
                        localidades e vários horários.</p>

                    <p>O Guia da Van também está no Facebook e Whatsapp (19) 98188-7373.</p>
                </div>

            </div>

            <div class="col-12 col-lg-5" style="margin: 0 auto;">
                <div class="takeMissao">
                    <div class="item_mission">
                        <h2>Missão</h2>
                        <div class="text_item">Facilitar a oferta e procura por serviços realizados com Vans escolares, excursões, executivos e fretes. Disseminar o uso de boas práticas como Direção Defensiva e Trabalho Voluntário, através das mídias sociais.</div>
                    </div>
                    <div class="item_mission">
                        <h2>Visão</h2>
                        <div class="text_item">Ser referência na busca por serviços com Vans em todo o Brasil.</div>
                    </div>
                    <div class="item_mission">
                        <h2>Valores</h2>
                        <div class="text_item">Respeito às Pessoas, fazer a coisa certa e valorizar o estudo e a leitura.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="how_find">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12 col-lg-6">
                <div class="button_tag">
                    <h2>Como procurar?</h2>
                </div>
                <div class="title">
                    <h3>A procura por vans se faz de <span>forma simples e eficaz</span></h3>
                </div>

                <div class="text">
                    <p>Qualquer pessoa que selecionar o local de saída e chegada irá receber a informação das
                        vans cadastradas para este trajeto. O Site Guia da Van tem como objetivo a divulgação
                        dos serviços prestados por vans.</p>

                    <p>Os proprietários de vans podem cadastrar o tipo de serviço executado (transporte para
                        escolas e faculdades, excursões, serviços executivos, fretes) e o local onde este serviço
                        é executado. Não se enquadra no Site Guia da Van, os serviços de Vans prestados no
                        conceito de transporte alternativo, clandestinos ou regularizados.</p>

                    <p>Através de um sistema de filtros, os usuários irão selecionar o tipo de serviço que
                        necessitam e o local onde o serviço será executado. O sistema irá reportar as vans
                        cadastradas para os serviços e locais selecionados. Os cadastros dos serviços e
                        locais onde serão executados são de responsabilidade do proprietário da van.
                        O proprietário pode optar se quer ou não, cadastrar seus serviços no site.</p>

                    <p>Caso não existam vans cadastradas para o serviço ou local selecionado, o
                        solicitante deve procurar outro recurso para localizar a van que necessita.
                        Este recurso pode ser via internet, outros recursos de divulgação ou em
                        contato direto com a instituição para onde deseja o serviço.</p>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="imagem"><img src="{{ URL('/images/imagem_how_find.png') }}" alt="" class="img-fluid"></div>
            </div>
        </div>
    </div>
</div>

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

<script>
    jQuery("#quem-somos").addClass("activeMenu");
</script>
@endsection