<div class="container">
    <form action="{{ route('busca_resultado') }}" method="POST">
        @csrf
        @method('GET')
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
                                    <select name="cidade_saida_escola" id="" class="form-control">
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <select name="cidade_chegada_escola" id="" class="form-control">
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <input type="text" name="escola" class="form-control" placeholder="Escola"
                                        value="">
                                    <br>
                                    <select name="periodo" id="" class="form-control">
                                        <option value="diurno">Diurno</option>
                                        <option value="vespertino">Vespertino</option>
                                        <option value="noturno">Noturno</option>
                                    </select>
                                @break

                                @case(2)
                                    <select name="cidade_saida_evento" id="" class="form-control">
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <input type="text" name="evento" class="form-control"
                                        placeholder="Evento caso necessario" value="">
                                @break

                                @case(3)
                                    <select name="cidade_saida_executivo" id="" class="form-control">
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                        @endforeach
                                    </select>
                                @break

                                @case(4)
                                    <select name="cidade_saida_frete" id="" class="form-control">
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
        <button type="submit" class="btn btn-primary">BUSCAR</button>
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
