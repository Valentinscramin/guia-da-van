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
                    <div class="imagem" style="position: absolute; right: 0; text-align: right; z-index: 2;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container" style="display:flex;">
    @foreach ($vans as $eachVan)
    <div class="card text-start">
        <img class="card-img-top" src="https://cdn.cloudflare.steamstatic.com/steam/apps/1548130/capsule_616x353.jpg?t=1631134025" alt="Title">
        <div class="card-body">
            <h4 class="card-title">{{ $eachVan->van }}</h4>
            <p class="card-text">Placa: {{ $eachVan->placa }}</p>
            <p class="card-text">Usuario: <a href="{{ route('profile_show', $eachVan->usuario_id) }}" target="_blank">{{ $eachVan->usuario_nome }}</a></p>
            <p class="card-text">Celular: {{ $eachVan->usuario_celular }}</p>
            <p class="card-text">Trajeto: {{ $eachVan->trajeto }}</p>
            @if (!is_null($eachVan->periodo))
            <p class="card-text">Periodo: {{ $eachVan->periodo }}</p>
            @endif
            <p class="card-text">observacoes: {{ $eachVan->comment }}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection