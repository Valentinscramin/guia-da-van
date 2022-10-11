@foreach ($track as $eachTrack)
<div class="item">
    <label for="track-{{ $eachTrack->id }}">
        {{ $eachTrack->name }}
    </label>
    @if (isset($track_selected))
    @if (array_key_exists($eachTrack->id, $track_selected))
    <input type="checkbox" name="track[]" value="{{ $eachTrack->id }}" id="track-{{ $eachTrack->id }}" checked>
    <div class="collapse" id="collapse-{{ $eachTrack->id }}" style="display:block;">
        @else
        <input type="checkbox" name="track[]" value="{{ $eachTrack->id }}" id="track-{{ $eachTrack->id }}">
        <div class="collapse" id="collapse-{{ $eachTrack->id }}" style="display:none;">
            @endif
            @else
            <input type="checkbox" name="track[]" value="{{ $eachTrack->id }}" id="track-{{ $eachTrack->id }}">
            <div class="collapse" id="collapse-{{ $eachTrack->id }}" style="display:none;">
                @endif
                <div class="card card-body">
                    @switch($eachTrack->id)
                    @case(1)
                    <select name="cidade_saida_escola" id="">
                        @foreach ($cities as $citie)
                        @if ($citie->id == @$track_selected[1]['cidade_saida'])
                        <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                        @else
                        <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                        @endif
                        @endforeach
                    </select>
                    <br>
                    <select name="cidade_chegada_escola" id="">
                        @foreach ($cities as $citie)
                        @if ($citie->id == @$track_selected[1]['cidade_chegada'])
                        <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                        @else
                        <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                        @endif
                        @endforeach
                    </select>
                    <br>
                    <input type="text" name="escola" placeholder="Escola" value="{{ @$track_selected[1]['escola'] }}">
                    <br>

                    <select name="periodo" id="">
                        <option value="diurno" @if (@$track_selected[1]['periodo']=='diurno' ) selected @endif>Diurno</option>
                        <option value="vespertino" @if (@$track_selected[1]['periodo']=='vespertino' ) selected @endif>Vespertino</option>
                        <option value="noturno" @if (@$track_selected[1]['periodo']=='noturno' ) selected @endif>Noturno</option>
                    </select>
                    @break

                    @case(2)
                    <select name="cidade_saida_evento" id="">

                        @foreach ($cities as $citie)
                        @if ($citie->id == @$track_selected[2]['cidade_saida'])
                        <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                        @else
                        <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                        @endif
                        @endforeach
                    </select>
                    <br>
                    <input type="text" name="evento" placeholder="Evento caso necessario" value="{{ @$track_selected[2]['evento'] }}">
                    @break

                    @case(3)
                    <select name="cidade_saida_executivo" id="">
                        @foreach ($cities as $citie)
                        @if ($citie->id == @$track_selected[3]['cidade_saida'])
                        <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                        @else
                        <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                        @endif
                        @endforeach
                    </select>
                    @break

                    @case(4)
                    <select name="cidade_saida_frete" id="">
                        @foreach ($cities as $citie)
                        @if ($citie->id == @$track_selected[4]['cidade_saida'])
                        <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                        @else
                        <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                        @endif
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
        <script>
            function collapseShow(id) {
                var x = document.getElementById("collapse-" + id);
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
            jQuery("#frota").addClass("active_dashboard");
        </script>