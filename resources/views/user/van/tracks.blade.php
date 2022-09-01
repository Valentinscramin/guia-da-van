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
                    <input type="text" name="cidade_saida_escola" class="form-control" placeholder="Cidade de saida"
                        value="{{ @$trackSelected[1]['cidade_saida'] }}">
                    <br>
                    <input type="text" name="cidade_chegada_escola" class="form-control" placeholder="Cidade de chegada"
                        value="{{ @$trackSelected[1]['cidade_chegada'] }}">
                    <br>
                    <input type="text" name="escola" class="form-control" placeholder="Escola" value="{{ @$trackSelected[1]['escola'] }}">
                    <br>
                    <input type="text" name="periodo" class="form-control" placeholder="Periodo" value="{{ @$trackSelected[1]['periodo'] }}">
                @break

                @case(2)
                    <input type="text" name="cidade_saida_evento" class="form-control" placeholder="Cidade de saida"
                        value="{{ @$trackSelected[2]['cidade_saida'] }}">
                    <br>
                    <input type="text" name="evento" class="form-control" placeholder="Evento caso necessario"
                        value="{{ @$trackSelected[2]['evento'] }}">
                @break

                @case(3)
                    <input type="text" name="cidade_saida_executivo" class="form-control" placeholder="Cidade de atuação"
                        value="{{ @$trackSelected[3]['cidade_saida'] }}">
                @break

                @case(4)
                    <input type="text" name="cidade_saida_frete" class="form-control" placeholder="Cidade de atuação"
                        value="{{ @$trackSelected[4]['cidade_saida'] }}">
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
