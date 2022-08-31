@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Plate</th>
                    <th>Seats</th>
                    <th>Tracks</th>
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
                            <a type="button" class="btn btn-primary" href="{{ route('van.edit', $eachVan->id) }}">edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
