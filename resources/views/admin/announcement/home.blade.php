@extends('layouts.appAdmin')

@section('content')
    <a href="{{ route('announcement.create') }}">Criar novo</a>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Url</th>
                    <th>Active</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($announcement as $eachAnnouncement)
                    <tr>
                        <td>{{ $eachAnnouncement->name }}</td>
                        <td>{{ $eachAnnouncement->url }}</td>
                        <td>
                            @if ($eachAnnouncement->active == 1)
                                {{ 'Active' }}
                            @else
                                {{ 'Inactive' }}
                            @endif
                        </td>
                        <td>
                            <a type="button" href="{{ route('announcement.edit', $eachAnnouncement->id) }}">edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
