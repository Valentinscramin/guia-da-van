@foreach ($track as $eachTrack)
    <div class="form-check">
        <label class="form-check-label" for="">
            {{ $eachTrack->name }}
        </label>
        @if (!is_null($trackSelected))
            @if (array_key_exists($eachTrack->id, $trackSelected))
                <input class="form-check-input" type="checkbox" name="track[]" value="{{ $eachTrack->id }}" id=""
                    onclick="collapseShow({{ $eachTrack->id }})" checked>
                <div class="collapse" id="collapse-{{ $eachTrack->id }}" style="display:block;">
                @else
                    <input class="form-check-input" type="checkbox" name="track[]" value="{{ $eachTrack->id }}"
                        id="" onclick="collapseShow({{ $eachTrack->id }})">
                    <div class="collapse" id="collapse-{{ $eachTrack->id }}" style="display:none;">
            @endif
        @else
            <input class="form-check-input" type="checkbox" name="track[]" value="{{ $eachTrack->id }}" id=""
                onclick="collapseShow({{ $eachTrack->id }})">
            <div class="collapse" id="collapse-{{ $eachTrack->id }}" style="display:none;">
        @endif
        <div class="card card-body">
            @switch($eachTrack->id)
                @case(1)
                    <select name="cidade_saida_escola" id="" class="form-control">
                        @foreach ($cities as $citie)
                            @if ($citie->id == @$trackSelected[1]['cidade_saida'])
                                <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                            @else
                                <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <br>
                    <select name="cidade_chegada_escola" id="" class="form-control">
                        {{-- {{ @$trackSelected[1]['cidade_chegada'] }} --}}
                        @foreach ($cities as $citie)
                            @if ($citie->id == @$trackSelected[1]['cidade_chegada'])
                                <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                            @else
                                <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <br>
                    <input type="text" name="escola" class="form-control" placeholder="Escola"
                        value="{{ @$trackSelected[1]['escola'] }}">
                    <br>
                    <input type="text" name="periodo" class="form-control" placeholder="Periodo"
                        value="{{ @$trackSelected[1]['periodo'] }}">
                @break

                @case(2)
                    <select name="cidade_saida_evento" id="" class="form-control">

                        @foreach ($cities as $citie)
                            @if ($citie->id == @$trackSelected[2]['cidade_saida'])
                                <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                            @else
                                <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <br>
                    <input type="text" name="evento" class="form-control" placeholder="Evento caso necessario"
                        value="{{ @$trackSelected[2]['evento'] }}">
                @break

                @case(3)
                    <select name="cidade_saida_executivo" id="" class="form-control">
                        @foreach ($cities as $citie)
                            @if ($citie->id == @$trackSelected[3]['cidade_saida'])
                                <option value="{{ $citie->id }}" selected>{{ $citie->name }}</option>
                            @else
                                <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                            @endif
                        @endforeach
                    </select>
                @break

                @case(4)
                    <select name="cidade_saida_frete" id="" class="form-control">
                        @foreach ($cities as $citie)
                            @if ($citie->id == @$trackSelected[4]['cidade_saida'])
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
</script>
