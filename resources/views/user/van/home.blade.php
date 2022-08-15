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
                </tr>
            </thead>
            <tbody>
                @foreach ($vans as $eachVan)
                    <tr>
                        <td>{{ $eachVan->model }}</td>
                        <td>{{ $eachVan->plate }}</td>
                        <td>{{ $eachVan->seats }}</td>
                        <td>{{ $eachVan->track }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
