@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Model</th>
                <th>Plate</th>
                <th>Seat</th>
                <th>Tracks</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vans as $eachVan)
                <tr>
                    <td>{{$eachVan->model}}</td>
                    <td>{{$eachVan->plate}}</td>
                    <td>{{$eachVan->seat}}</td>
                    <td>{{$eachVan->track}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
