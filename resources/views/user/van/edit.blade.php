@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('van.update', $van->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Model</label>
                <input type="text" name="model" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $van->model }}">
                <small id="helpId" class="text-muted">Model</small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Plate</label>
                <input type="text" name="plate" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $van->plate }}">
                <small id="helpId" class="text-muted">Plate</small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Seats</label>
                <input type="text" name="seats" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $van->seats }}">
                <small id="helpId" class="text-muted">Seats</small>
            </div>

            @foreach ($track as $eachTrack)
                <div class="form-check">
                    <label class="form-check-label" for="">
                        {{ $eachTrack->name }}
                    </label>
                    @if (!is_null($trackSelected))
                        @if (is_numeric(array_search($eachTrack->id, $trackSelected)))
                            <input class="form-check-input" type="checkbox" value="" id="" checked>
                        @else
                            <input class="form-check-input" type="checkbox" value="" id=""
                                data-bs-toggle="collapse" href="#collapse-{{ $eachTrack->id }}">
                            <div class="collapse" id="collapse-{{ $eachTrack->id }}">
                                <div class="card card-body">
                                    @switch($eachTrack->id)
                                        @case(1)
                                            <input type="text" name="cidade_saida" class="form-control"
                                                placeholder="Cidade de saida" value="">
                                            <br>
                                            <input type="text" name="cidade_chegada" class="form-control"
                                                placeholder="Cidade de chegada" value="">
                                            <br>
                                            <input type="text" name="escola" class="form-control" placeholder="Escola"
                                                value="">
                                            <br>
                                            <select name="periodo" class="form-control" placeholder="Periodo">
                                                <option value="noturno">Noturno</option>
                                                <option value="diurno">Diurno</option>
                                                <option value="vespertino">Vespertino</option>
                                            </select>
                                        @break

                                        @case(2)
                                            <input type="text" name="cidade_saida" class="form-control"
                                                placeholder="Cidade de saida" value="">
                                            <br>
                                            <input type="text" name="evento" class="form-control"
                                                placeholder="Evento caso necessario" value="">
                                        @break

                                        @case(3)
                                            <input type="text" name="cidade_saida" class="form-control"
                                                placeholder="Cidade de atuação" value="">
                                        @break

                                        @case(4)
                                            <input type="text" name="cidade_saida" class="form-control"
                                                placeholder="Cidade de atuação" value="">
                                        @break

                                        @default
                                    @endswitch
                                </div>
                            </div>
                        @endif
                        <br>
                    @else
                        <input class="form-check-input" type="checkbox" value="" id=""
                            data-bs-toggle="collapse" href="#collapse-{{ $eachTrack->id }}">
                        <div class="collapse" id="collapse-{{ $eachTrack->id }}">
                            <div class="card card-body">
                                @switch($eachTrack->id)
                                    @case(1)
                                        <input type="text" name="cidade_saida" class="form-control"
                                            placeholder="Cidade de saida" value="">
                                        <br>
                                        <input type="text" name="cidade_chegada" class="form-control"
                                            placeholder="Cidade de chegada" value="">
                                        <br>
                                        <input type="text" name="escola" class="form-control" placeholder="Escola"
                                            value="">
                                        <br>
                                        <input type="text" name="periodo" class="form-control" placeholder="Periodo"
                                            value="">
                                    @break

                                    @case(2)
                                        <input type="text" name="cidade_saida" class="form-control"
                                            placeholder="Cidade de saida" value="">
                                        <br>
                                        <input type="text" name="evento" class="form-control"
                                            placeholder="Evento caso necessario" value="">
                                    @break

                                    @case(3)
                                        <input type="text" name="cidade_saida" class="form-control"
                                            placeholder="Cidade de atuação" value="">
                                    @break

                                    @case(4)
                                        <input type="text" name="cidade_saida" class="form-control"
                                            placeholder="Cidade de atuação" value="">
                                    @break

                                    @default
                                @endswitch
                            </div>
                        </div>
                        <br>
                    @endif
                </div>
            @endforeach
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
