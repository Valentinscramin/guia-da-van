<div class="container">
    <form action="{{ route('busca_resultado') }}" method="POST">
        @csrf
        @method('GET')
        <div style="display: flex;">
            @foreach ($track as $eachTrack)
                <div>
                    <input type="radio" id="track-{{ $eachTrack->id }}" name="track" value="{{ $eachTrack->id }}"
                        onclick="collapseShow({{ $eachTrack->id }})">
                    <label for="track-{{ $eachTrack->id }}">
                        {{ $eachTrack->name }}
                    </label>
                    <div class="collapse" id="track-{{ $eachTrack->id }}">
                        <div class="card">
                            @switch($eachTrack->id)
                                @case(1)
                                    <select name="cidade_saida_escola" id="">
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <select name="cidade_chegada_escola" id="">
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <input type="text" name="escola" placeholder="Escola"
                                        value="">
                                    <br>
                                    <select name="periodo" id="">
                                        <option value="diurno">Diurno</option>
                                        <option value="vespertino">Vespertino</option>
                                        <option value="noturno">Noturno</option>
                                    </select>
                                @break

                                @case(2)
                                    <select name="cidade_saida_evento" id="">
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <input type="text" name="evento"
                                        placeholder="Evento caso necessario" value="">
                                @break

                                @case(3)
                                    <select name="cidade_saida_executivo" id="">
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                        @endforeach
                                    </select>
                                @break

                                @case(4)
                                    <select name="cidade_saida_frete" id="">
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                        @endforeach
                                    </select>
                                @break

                                @default
                            @endswitch
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <button type="submit">BUSCAR</button>
    </form>
</div>
