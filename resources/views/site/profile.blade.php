@extends('layouts.appSite')

@section('content')
    <div class="profile">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-lg-6">
                    <div class="bgUser"
                        style="background: url(/storage/{{ $profile_photo }})no-repeat center center; backgrouns-size: cover; width: 100%; height: 45vh; border-radius: 40px;">
                    </div>
                </div>
                <div class="col-12 col-lg-6 infos_user">
                    <div class="name">
                        <h2>{{ $user->name }} {{ $user->lastname }}</h2>
                    </div>
                    <div class="celular"> {{ $user->celular }}</div>
                    <div class="telefone"> {{ $user->telefone }}</div>
                    <div class="email"> {{ $user->email }}</div>
                </div>
                <div class="col-12">
                    <div class="title" style="text-align: center; margin: 80px 0 20px 0;">
                        <h2>Frota de <span>{{ $user->name }}</span></h2>
                    </div>
                    <div class="all_cards_result">
                        @foreach ($vans as $eachVan)
                            <div class="card_item text-start col-12 col-sm-6 col-lg-4 col-xl-3">
                                <div class="takeCard">
                                    <img class="card-img-top" src="/linkstorage/{{ $eachVan->arquivo }}" alt="Title">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{ $eachVan->model }}</h4>
                                    <p class="card-text">Placa: {{ $eachVan->plate }}</p>
                                    <p class="card-text">observacoes: {{ $eachVan->comment }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-md-6 coments">
                    <div class="title">
                        <h2>Comentários</h2>
                    </div>
                    @foreach ($user->comment as $eachComment)
                        <div class="item_coment col-12 col-md-10">{{ $eachComment->comment }}</div>
                    @endforeach
                </div>
                <div class="col-12 col-md-6">
                    @if (isset(Auth::user()->id) && $no_avaliation)
                        <div class="select_stars col-12">Quantas estrelas você daria?</div>
                        <div class="stars">
                            <form action="{{ route('avaliation.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="avaliation" value="1">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit">
                                    @if ($stars > 0)
                                        <span
                                            class="fa fa-star @if ($stars['one']) {{ 'checked' }} @endif"></span>
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
                                <button type="submit">
                                    @if ($stars > 0)
                                        <span
                                            class="fa fa-star @if ($stars['two']) {{ 'checked' }} @endif"></span>
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
                                <button type="submit">
                                    @if ($stars > 0)
                                        <span
                                            class="fa fa-star @if ($stars['three']) {{ 'checked' }} @endif"></span>
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
                                <button type="submit">
                                    @if ($stars > 0)
                                        <span
                                            class="fa fa-star @if ($stars['four']) {{ 'checked' }} @endif"></span>
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
                                <button type="submit">
                                    @if ($stars > 0)
                                        <span
                                            class="fa fa-star @if ($stars['five']) {{ 'checked' }} @endif"></span>
                                    @else
                                        <span class="fa fa-star"></span>
                                    @endif
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="all_stars">
                            <span class="fa fa-star"
                                @if (is_array($stars['one'])) {{ 'style=color:yellow;' }} @endif></span>
                            <span class="fa fa-star"
                                @if (is_array($stars['two'])) {{ 'style=color:yellow;' }} @endif></span>
                            <span class="fa fa-star"
                                @if (is_array($stars['three'])) {{ 'style=color:yellow;' }} @endif></span>
                            <span class="fa fa-star"
                                @if (is_array($stars['four'])) {{ 'style=color:yellow;' }} @endif></span>
                            <span class="fa fa-star"
                                @if (is_array($stars['five'])) {{ 'style=color:yellow;' }} @endif></span>
                        </div>
                    @endif

                    @if (isset(Auth::user()->id))
                        <form method="POST" action="{{ route('comment_push') }}">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="formulario formulario_pages col-12">
                                <div class="itemInput">
                                    <label for="comment">Deseja fazer seu comentario?</label>
                                    <textarea name="comment" id="comment" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="col-12 btn_submit"><button type="submit">Avaliar</button></div>
                            </div>
                        </form>
                        <br>
                    @endif
                </div>


            </div>
        </div>
    </div>
@endsection
