@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tracks as $eachTrack)
                    <tr>
                        <td>{{ $eachTrack->name }}</td>
                        <td>
                            @if ($eachTrack->active == 1)
                                {{ 'Active' }}
                            @else
                                {{ 'Inactive' }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
