@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>active</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tracks as $eachTrack)
                    <tr>
                        <td>{{ $eachTrack->name }}</td>
                        <td>{{ $eachTrack->active }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
