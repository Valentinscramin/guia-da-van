<div class="itemInput col-12" id="trajetos-van">
    @if (null !== @$track_selected)
        @php
            $count = 0;
        @endphp
        @foreach ($track_selected as $key => $eachTrack)
            <div class='card itemInput col-12 col-sm-4' style='width: 18rem;'>
                <div class='card-body'>
                    <h5 class='card-title'>Trajeto:</h5>
                    <select name='track[]' class="track_selector" onchange='change(this)' data-card='{{ $count }}'>
                        @foreach ($track as $eachTrackChoose)
                            @if ($eachTrackChoose->id == $eachTrack['id'])
                                <option value="{{ $eachTrackChoose->id }}" selected>{{ $eachTrackChoose->name }}
                                </option>
                            @else
                                <option value="{{ $eachTrackChoose->id }}">{{ $eachTrackChoose->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <select name='cidade_saida[]' id='cidade_saida_{{ $count }}'>
                        @foreach ($cities as $citie)
                            @if ($citie->id == @$eachTrack['cidade_saida'])
                                <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                            @else
                                <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <select name='cidade_chegada[]' id='cidade_chegada_{{ $count }}'>
                        @foreach ($cities as $citie)
                            @if ($citie->id == @$eachTrack['cidade_chegada'])
                                <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                            @else
                                <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <input type='text' name='escola[]' id='escola_{{ $count }}' placeholder='Escola'
                        value='{{ @$eachTrack['escola'] }}'>
                    <input type='text' name='evento[]' id='evento_{{ $count }}' placeholder='Evento'
                        value='{{ @$eachTrack['evento'] }}' placeholder='Evento caso necessario' style='display:none;'>
                    <select name='periodo[]' id='periodo_{{ $count }}'>
                        <option value='diurno' @if ($eachTrack['periodo'] == 'diurno') {{ 'selected' }} @endif>Diurno
                        </option>
                        <option value='vespertino' @if ($eachTrack['periodo'] == 'vespertino') {{ 'selected' }} @endif>
                            Vespertino</option>
                        <option value='noturno' @if ($eachTrack['periodo'] == 'noturno') {{ 'selected' }} @endif>Noturno
                        </option>
                    </select>
                </div>
            </div>
            @php
                $count++;
            @endphp
        @endforeach
    @endif
</div>

<div class="itemInput col-12">
    <div class="add_tracking col-12"><a type="button" class="add-trajeto">+ Adicionar Trajeto</a></div>
</div>
