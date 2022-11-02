@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Perfil</th>
                    <th>&nbsp;</th>
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
                        <td>
                            <a type="button" href="{{ route('profile_show', $eachUser->id) }}">Ver Perfil</a>
                        </td>
                        <td>
                            <a type="button" href="{{ route('user.edit', $eachUser->id) }}">edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>{{ $users->links() }}</div>
@endsection
