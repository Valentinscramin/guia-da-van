@extends('layouts.appSite')

@section('content')
    <section>
        <div class="bannerTop">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12 col-lg-8">
                        <div class="takeItem">
                            <div class="button_tag">

                                <h2>Resultado de busca</h2>

                            </div>

                            <div class="title">
                                <h2>A procura por vans de <span>forma simples e eficaz</span></h2>
                            </div>
                        </div>
                        <div class="search">
                            <div class="titleSearch">
                                <h2>Busca Personalizada</h2>
                            </div>
                            <div class="formulario col-12 col-md-10">
                                @include('site.filtro')
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="imagem" style="width: 40%;"> <img src="{{ URL('/images/search_result.jpg') }}"
                                alt="" class="img-fluid"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="all_cards_result">
            @foreach ($vans as $eachVan)
                <div class="card_item text-start col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="takeCard">
                        @if (is_null($eachVan->van_photo))
                            <img class="card-img-top" src="/storage/{{ $eachVan->van_photo }}" alt="{{ $eachVan->van }}">
                        @else
                            <img class="card-img-top" src="/images/empty.jpg" alt="{{ $eachVan->van }}">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">{{ $eachVan->van }}</h4>
                            <p class="card-text">Usuario: <a href="{{ route('profile_show', $eachVan->usuario_id) }}"
                                    target="_blank">{{ $eachVan->usuario_nome }}</a></p>
                            <p class="card-text">Celular: {{ $eachVan->usuario_celular }}</p>
                            <p class="card-text">Trajeto: {{ $eachVan->trajeto }}</p>
                            @if (!is_null($eachVan->periodo))
                                <p class="card-text">Periodo: {{ $eachVan->periodo }}</p>
                            @endif
                            <p class="card-text">observacoes: {{ $eachVan->comment }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
