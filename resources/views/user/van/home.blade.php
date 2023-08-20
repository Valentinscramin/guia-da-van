@extends('layouts.app')

@section('content')
    <div class="content_middle_dashboard">
        <div class="col-11 take__header__middle">
            <div class="col-6">
                <h2>Minha <span>Frota</span></h2>
            </div>
            @if (count($vans) < env('VANS_PERMITIDAS'))
                <div class="btn_register col-6"><a href="{{ route('van.create') }}">Cadastrar nova van</a></div>
            @endif
        </div>
        <div class="table_dashboard col-11">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome da empresa</th>
                        <th>Placa</th>
                        <th>Assentos</th>
                        <th>Trajetos</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vans as $eachVan)
                        <tr>
                            <td>{{ $eachVan->model }}</td>
                            <td>{{ $eachVan->plate }}</td>
                            <td>{{ $eachVan->seats }}</td>
                            <td>
                                @foreach ($eachVan->track as $eachTrack)
                                    {{ $eachTrack->name . ', ' }}
                                @endforeach
                            </td>
                            <td>
                                <div class="btn_edit"><a type="button" href="{{ route('van.edit', $eachVan->id) }}">Editar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        {{ $vans->links() }}
    </div>
    <script>
        jQuery("#frota").addClass("active_dashboard");
    </script>
@endsection
