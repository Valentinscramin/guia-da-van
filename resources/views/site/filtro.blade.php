<div class="container">
    <form action="">
        <div style="display: flex;">
            @foreach ($track as $eachTrack)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="track" value="{{ $eachTrack->id }}"
                        onclick="collapseShow({{ $eachTrack->id }})">
                    <label class="form-check-label" for="track-{{ $eachTrack->id }}">
                        {{ $eachTrack->name }}
                    </label>
                    <div class="collapse" id="track-{{ $eachTrack->id }}">
                        <div class="card card-body">
                            @switch($eachTrack->id)
                                @case(1)
                                    <input type="text" name="cidade_saida_escola" class="form-control"
                                        placeholder="Cidade de saida" value="">
                                    <br>
                                    <input type="text" name="cidade_chegada_escola" class="form-control"
                                        placeholder="Cidade de chegada" value="">
                                    <br>
                                    <input type="text" name="escola" class="form-control" placeholder="Escola"
                                        value="">
                                    <br>
                                    <input type="text" name="periodo" class="form-control" placeholder="Periodo"
                                        value="">
                                @break

                                @case(2)
                                    <input type="text" name="cidade_saida_evento" class="form-control"
                                        placeholder="Cidade de saida" value="">
                                    <br>
                                    <input type="text" name="evento" class="form-control"
                                        placeholder="Evento caso necessario" value="">
                                @break

                                @case(3)
                                    <input type="text" name="cidade_saida_executivo" class="form-control"
                                        placeholder="Cidade de atuação" value="">
                                @break

                                @case(4)
                                    <input type="text" name="cidade_saida_frete" class="form-control"
                                        placeholder="Cidade de atuação" value="">
                                @break

                                @default
                            @endswitch
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
</div>

<script>
    function collapseShow(id) {
        // document.getElementsByClassName("collapse").style.display = 'none';
        var x = document.getElementById("track-" + id);
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
