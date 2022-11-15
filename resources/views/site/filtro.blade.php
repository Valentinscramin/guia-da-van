<form action="{{ route('busca_resultado') }}" method="POST">
    @csrf
    @method('GET')
    @foreach ($track as $eachTrack)
        <div class="item">
            <div class="item_input" data-id="track-{{ $eachTrack->id }}">
                <input type="radio" id="track-{{ $eachTrack->id }}" name="track" value="{{ $eachTrack->id }}">
                <label for="track-{{ $eachTrack->id }}">
                    {{ $eachTrack->name }}
                </label>
            </div>
        </div>
    @endforeach
    @foreach ($track as $eachTrack)
        <div class="collapse_filter col-12">

            @switch($eachTrack->id)
                @case(1)
                    <div class="content_filter" id="content_track-{{ $eachTrack->id }}">

                        {{-- <div class="itemInput col-12 col-sm-6">
                <select name="cidade_saida_escola" id="">
                    @foreach ($cities as $citie)
                    <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="itemInput col-12 col-sm-6">
                <select name="cidade_chegada_escola" id="">
                    @foreach ($cities as $citie)
                    <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                    @endforeach
                </select>
            </div> --}}

                        <div class="itemInput col-12 col-sm-6 col-lg-8">
                            <input type="text" name="escola" placeholder="Escola" value="">
                        </div>
                        <div class="itemInput col-12 col-sm-6 col-lg-4">
                            <select name="periodo" id="">
                                <option value="diurno">Diurno</option>
                                <option value="vespertino">Vespertino</option>
                                <option value="noturno">Noturno</option>
                            </select>
                        </div>
                    </div>
                @break

                @case(2)
                    <div class="content_filter" id="content_track-{{ $eachTrack->id }}">
                        {{-- <div class="itemInput col-12 col-sm-6">
                <select name="cidade_saida_evento" id="">
                    @foreach ($cities as $citie)
                    <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                    @endforeach
                </select>
            </div> --}}
                        <div class="itemInput col-12 col-sm-6">
                            <input type="text" name="evento" placeholder="Evento caso necessario" value="">
                        </div>
                    </div>
                @break

                @case(3)
                    <div class="content_filter" id="content_track-{{ $eachTrack->id }}">

                        <div class="itemInput col-12 col-sm-6">
                            <select name="estado_executivo" data-id="estado_executivo" class="estado_jqry">
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        {{-- <div class="itemInput col-12 col-sm-6">
                <select name="cidade_saida_executivo" id="">
                    @foreach ($cities as $citie)
                    <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                    @endforeach
                </select>
            </div> --}}
                    </div>
                @break

                @case(4)
                    <div class="content_filter" id="content_track-{{ $eachTrack->id }}">

                        <div class="itemInput col-12 col-sm-6">
                            <select name="estado_frete" data-id="estado_frete" class="estado_jqry">
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="itemInput col-12 col-sm-6">
                <select name="cidade_saida_frete" id="">
                    @foreach ($cities as $citie)
                    <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                    @endforeach
                </select>
            </div> --}}
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
