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
                @foreach ($users as $eachUser)
                    <tr>
                        <td>{{ $eachUser->name }}</td>
                        <td>
                            @if ($eachUser->active == 1)
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
