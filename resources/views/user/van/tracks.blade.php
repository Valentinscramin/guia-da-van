<div class="itemInput col-12" id="trajetos-van">
    @if (null !== @$track_selected)
        @php
            $count = 0;
        @endphp
        @foreach ($track_selected as $key => $eachTrack)
            <div class='card itemInput cart_item col-12 col-sm-4' style='width: 18rem;'>
                <div class='card-body'>
                    <h5 class='card-title'>Trajeto:</h5>
                    <div class="item_card_">
                        <select name='track[]' class="track_selector" onchange='change(this)'
                            data-card='{{ $eachTrack['id'] . '_' . $count }}'>
                            @foreach ($track as $eachTrackChoose)
                                @if ($eachTrackChoose->id == $eachTrack['id'])
                                    <option value="{{ $eachTrackChoose->id }}"
                                        data-show="{{ $eachTrack['id'] . '_' . $count }}" selected>
                                        {{ $eachTrackChoose->name }}
                                    </option>
                                @else
                                    <option value="{{ $eachTrackChoose->id }}">{{ $eachTrackChoose->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="item_card_">
                        <select id='estado_saida_{{ $eachTrack['id'] . '_' . $count }}'
                            data-id="saida_{{ $eachTrack['id'] . '_' . $count }}" class="estado_jqry">
                            @foreach ($states as $key => $value)
                                @if ($value->id == $eachTrack['estado_saida'])
                                    <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="item_card_">
                        <select name='cidade_saida[]' id="cidade_saida_{{ $eachTrack['id'] . '_' . $count }}">
                            @foreach ($eachTrack['cidades_estado_saida'] as $citie)
                                @if ($citie->id == @$eachTrack['cidade_saida'])
                                    <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                                @else
                                    <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="item_card_">
                        <select id='estado_chegada_{{ $eachTrack['id'] . '_' . $count }}'
                            data-id="chegada_{{ $eachTrack['id'] . '_' . $count }}" class="estado_jqry">
                            @foreach ($states as $key => $value)
                                @if ($value->id == @$eachTrack['estado_chegada'])
                                    <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="item_card_">
                        <select name='cidade_chegada[]' id="cidade_chegada_{{ $eachTrack['id'] . '_' . $count }}">
                            @if ($eachTrack['cidades_estado_chegada'])
                                @foreach ($eachTrack['cidades_estado_chegada'] as $citie)
                                    @if ($citie->id == @$eachTrack['cidade_chegada'])
                                        <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                                    @else
                                        <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="item_card_">
                        <input type='text' name='escola[]' id='escola_{{ $eachTrack['id'] . '_' . $count }}'
                            placeholder='Escola' value='{{ @$eachTrack['escola'] }}'>
                    </div>
                    <div class="item_card_">
                        <input type='text' name='evento[]' id='evento_{{ $eachTrack['id'] . '_' . $count }}'
                            placeholder='Evento' value='{{ @$eachTrack['evento'] }}'
                            placeholder='Evento caso necessario' style='display:none;'>
                    </div>
                    <div class="item_card_">
                        <select name='periodo[]' id='periodo_{{ $eachTrack['id'] . '_' . $count }}'>
                            <option value='diurno' @if ($eachTrack['periodo'] == 'diurno') {{ 'selected' }} @endif>Diurno
                            </option>
                            <option value='vespertino' @if ($eachTrack['periodo'] == 'vespertino') {{ 'selected' }} @endif>
                                Vespertino</option>
                            <option value='noturno' @if ($eachTrack['periodo'] == 'noturno') {{ 'selected' }} @endif>
                                Noturno
                            </option>
                        </select>
                    </div>
                </div>
                <div class="item_card_ button_delete">
                    <a type="button" onclick="deleteTrack(this)" data-track="{{ $eachTrack['van_track_id'] }}"
                        data-van="{{ $van->id }}"> Deletar</a>
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
