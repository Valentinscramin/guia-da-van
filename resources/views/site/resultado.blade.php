@extends('layouts.appSite')

@section('content')
    <div class="container" style="display:flex;">
        @foreach ($vans as $eachVan)
            <div class="card text-start">
                <img class="card-img-top"
                    src="https://cdn.cloudflare.steamstatic.com/steam/apps/1548130/capsule_616x353.jpg?t=1631134025"
                    alt="Title">
                <div class="card-body">
                    <h4 class="card-title">{{ $eachVan->van }}</h4>
                    <p class="card-text">Placa: {{ $eachVan->placa }}</p>
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
        @endforeach
    </div>
@endsection
