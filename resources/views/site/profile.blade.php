@extends('layouts.appSite')

@section('content')
    <div class="container">
        <img src="/storage/{{ $profile_photo }}" alt="Foto do perfil do usuario {{ $user->name }}">
        <h2>{{ $user->name }}</h2>
        <p>{{ @$user->cpf_cnpj }}</p>
        <p>{{ $user->celular }}</p>
        <p>{{ $user->telefone }}</p>
        @if (isset(Auth::user()->id))
            <div style="display: flex; justify-content:space-around; width: 250px;">
                <form action="{{ route('avaliation.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="avaliation" value="1">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">
                        @if ($stars > 0)
                            <span class="fa fa-star @if ($stars['one']) {{ 'checked' }} @endif"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif
                    </button>
                </form>
                <form action="{{ route('avaliation.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="avaliation" value="2">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">
                        @if ($stars > 0)
                            <span class="fa fa-star @if ($stars['two']) {{ 'checked' }} @endif"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif
                    </button>
                </form>
                <form action="{{ route('avaliation.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="avaliation" value="3">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">
                        @if ($stars > 0)
                            <span class="fa fa-star @if ($stars['three']) {{ 'checked' }} @endif"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif
                    </button>
                </form>
                <form action="{{ route('avaliation.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="avaliation" value="4">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">
                        @if ($stars > 0)
                            <span class="fa fa-star @if ($stars['four']) {{ 'checked' }} @endif"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif
                    </button>
                </form>
                <form action="{{ route('avaliation.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="avaliation" value="5">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">
                        @if ($stars > 0)
                            <span class="fa fa-star @if ($stars['five']) {{ 'checked' }} @endif"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif
                    </button>
                </form>
            </div>
        @else
            <span class="fa fa-star @if ($stars['one']) {{ 'checked' }} @endif"></span>
            <span class="fa fa-star @if ($stars['two']) {{ 'checked' }} @endif"></span>
            <span class="fa fa-star @if ($stars['three']) {{ 'checked' }} @endif"></span>
            <span class="fa fa-star @if ($stars['four']) {{ 'checked' }} @endif"></span>
            <span class="fa fa-star @if ($stars['five']) {{ 'checked' }} @endif"></span>
        @endif
        <br>
        @if (isset(Auth::user()->id))
            <form method="POST" action="{{ route('comment_push') }}">
                @csrf
                @method('POST')
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="mb-3">
                    <label for="comment" class="form-label">Deseja fazer seu comentario ?</label>
                    <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comentar</button>
            </form>
            <br>
        @endif
        @foreach ($user->comment as $eachComment)
            {{ $eachComment->comment }}
        @endforeach
        @foreach ($vans as $eachVan)
            <div class="card text-start">
                <div class="col-12 col-sm-2 col-lg-1">
                    <img class="card-img-top" src="/storage/{{ $eachVan->arquivo }}" alt="Title">
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $eachVan->model }}</h4>
                    <p class="card-text">Placa: {{ $eachVan->plate }}</p>
                    <p class="card-text">observacoes: {{ $eachVan->comment }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
