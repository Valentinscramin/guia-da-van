<form action="{{ route('busca_resultado') }}" method="POST">
    @csrf
    @method('GET')
    @foreach ($track as $eachTrack)
        <div class="item">
            @if ($eachTrack->id == Request::old('track'))
                <div class="item_input" data-id="track-{{ $eachTrack->id }}">
                    <input type="radio" id="track-{{ $eachTrack->id }}" name="track" value="{{ $eachTrack->id }}"
                        checked>
                    <label for="track-{{ $eachTrack->id }}">
                        {{ $eachTrack->name }}
                    </label>
                </div>
            @else
                <div class="item_input" data-id="track-{{ $eachTrack->id }}">
                    <input type="radio" id="track-{{ $eachTrack->id }}" name="track" value="{{ $eachTrack->id }}">
                    <label for="track-{{ $eachTrack->id }}">
                        {{ $eachTrack->name }}
                    </label>
                </div>
            @endif
        </div>
    @endforeach
    @foreach ($track as $eachTrack)
        <div class="collapse_filter col-12">

            @switch($eachTrack->id)
                @case(1)
                    <div class="content_filter" id="content_track-{{ $eachTrack->id }}">
                        <div class="itemInput col-12 col-sm-6">
                            <label for="">Estado de saida</label>
                            <select name="estado_saida_escola" data-id="saida_escola_1" class="estado_jqry" style="width: 90% !important;">
                                @foreach ($states as $state)
                                    @if ($state->id == Request::old('estado_saida_escola'))
                                        <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                                    @else
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="itemInput col-12 col-sm-6">
                            <label for="">Cidade de saida</label>
                            <select name="cidade_saida_escola" id="cidade_saida_escola_1" style="width: 90% !important; gap:10px;">
                                @if (!is_null($citiesOne))
                                    @foreach ($citiesOne as $eachCitieOne)
                                        @if ($eachCitieOne->id == Request::old('cidade_saida_escola'))
                                            <option value="{{ $eachCitieOne->id }}" selected> {{ $eachCitieOne->name }}
                                            </option>
                                        @else
                                            <option value="{{ $eachCitieOne->id }}"> {{ $eachCitieOne->name }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="">Selecione o estado</option>
                                @endif
                            </select>
                        </div>
                        <div class="itemInput col-12 col-sm-6">
                            <label for="">Estado de chegada</label>
                            <select name="estado_chegada_escola" data-id="chegada_escola_2" class="estado_jqry" style="width: 90% !important;">
                                @foreach ($states as $state)
                                    @if ($state->id == Request::old('estado_chegada_escola'))
                                        <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                                    @else
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="itemInput col-12 col-sm-6">
                            <label for="">Cidade de chegada</label>
                            <select name="cidade_chegada_escola" id="cidade_chegada_escola_2" style="width: 90% !important;">
                                @if (!is_null($citiesTwo))
                                    @foreach ($citiesTwo as $eachCitieTwo)
                                        @if ($eachCitieTwo->id == Request::old('cidade_chegada_escola'))
                                            <option value="{{ $eachCitieTwo->id }}" selected> {{ $eachCitieTwo->name }}
                                            </option>
                                        @else
                                            <option value="{{ $eachCitieTwo->id }}"> {{ $eachCitieTwo->name }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="">Selecione o estado</option>
                                @endif
                            </select>
                        </div>

                        <div class="itemInput col-12 col-sm-6 col-lg-8">
                            <label for="">Escola</label>
                            <input type="text" name="escola" placeholder="Escola" value="{{ Request::old('escola') }}">
                        </div>
                        <div class="itemInput col-12 col-sm-6 col-lg-4">
                            <label for="">Periodo</label>
                            <select name="periodo" id="" style="width: 90% !important;">
                                <option value="diurno" @if (Request::old('periodo') == 'diurno') selected @endif>Diurno</option>
                                <option value="vespertino" @if (Request::old('periodo') == 'vespertino') selected @endif>Vespertino</option>
                                <option value="noturno" @if (Request::old('periodo') == 'noturno') selected @endif>Noturno</option>
                            </select>
                        </div>
                    </div>
                @break

                @case(2)
                    <div class="content_filter" id="content_track-{{ $eachTrack->id }}">

                        <div class="itemInput col-12 col-sm-6">
                            <label for="">Estado de saida</label>
                            <select name="estado_evento" data-id="saida_evento" class="estado_jqry" style="width: 90% !important;">
                                @foreach ($states as $state)
                                    @if ($state->id == Request::old('estado_evento'))
                                        <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                                    @else
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="itemInput col-12 col-sm-6">
                            <label for="">Cidade de saida</label>
                            <select name="cidade_saida_evento" id="cidade_saida_evento" style="width: 90% !important;">
                                @if (!is_null($citiesOne))
                                    @foreach ($citiesOne as $eachCitieOne)
                                        @if ($eachCitieOne->id == Request::old('cidade_saida_evento'))
                                            <option value="{{ $eachCitieOne->id }}" selected> {{ $eachCitieOne->name }}
                                            </option>
                                        @else
                                            <option value="{{ $eachCitieOne->id }}"> {{ $eachCitieOne->name }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="">Selecione o estado</option>
                                @endif
                            </select>
                        </div>
                        <div class="itemInput col-12 col-sm-6 col-lg-12">
                            <label for="">Nome do evento</label>
                            <input type="text" name="evento" placeholder="Evento caso necessario"
                                value="{{ Request::old('evento') }}">
                        </div>
                    </div>
                @break

                @case(3)
                    <div class="content_filter" id="content_track-{{ $eachTrack->id }}">
                        <div class="itemInput col-12 col-sm-6">
                            <label for="">Estado de saida</label>
                            <select name="estado_executivo" data-id="saida_executivo" class="estado_jqry" style="width: 90% !important;">
                                @foreach ($states as $state)
                                    @if ($state->id == Request::old('estado_executivo'))
                                        <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                                    @else
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="itemInput col-12 col-sm-6">
                            <label for="">Cidade de saida</label>
                            <select name="cidade_saida_executivo" id="cidade_saida_executivo" style="width: 90% !important;">
                                @if (!is_null($citiesOne))
                                    @foreach ($citiesOne as $eachCitieOne)
                                        @if ($eachCitieOne->id == Request::old('cidade_saida_executivo'))
                                            <option value="{{ $eachCitieOne->id }}" selected> {{ $eachCitieOne->name }}
                                            </option>
                                        @else
                                            <option value="{{ $eachCitieOne->id }}"> {{ $eachCitieOne->name }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="">Selecione o estado</option>
                                @endif
                            </select>
                        </div>
                    </div>
                @break

                @case(4)
                    <div class="content_filter" id="content_track-{{ $eachTrack->id }}">
                        <div class="itemInput col-12 col-sm-6">
                            <label for="">Estado de saida</label>
                            <select name="estado_frete" data-id="saida_frete" class="estado_jqry" style="width: 90% !important;">
                                @foreach ($states as $state)
                                    @if ($state->id == Request::old('estado_frete'))
                                        <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                                    @else
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="itemInput col-12 col-sm-6">
                            <label for="">Cidade de saida</label>
                            <select name="cidade_saida_frete" id="cidade_saida_frete" style="width: 90% !important;">
                                @if (!is_null($citiesOne))
                                    @foreach ($citiesOne as $eachCitieOne)
                                        @if ($eachCitieOne->id == Request::old('cidade_saida_frete'))
                                            <option value="{{ $eachCitieOne->id }}" selected> {{ $eachCitieOne->name }}
                                            </option>
                                        @else
                                            <option value="{{ $eachCitieOne->id }}"> {{ $eachCitieOne->name }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="">Selecione o estado</option>
                                @endif
                            </select>
                        </div>
                    </div>
                @break

                @default
            @endswitch

        </div>
    @endforeach
    <div class="btnSubmit col-12"><button type="submit" disabled><img src="{{ URL('/images/lupa.svg') }}"
                alt=""> <img src="{{ URL('/images/line.svg') }}" alt="" class="line"> Buscar
            Van</button></div>
</form>
<script>
    $("select").select2();
</script>
