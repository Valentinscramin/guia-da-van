@extends('layouts.appAdmin')

@section('content')
    <a href="{{ route('faq.create') }}">Criar novo</a>
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
                @foreach ($faq as $eachFaq)
                    <tr>
                        <td>{{ $eachFaq->question }}</td>
                        <td>
                            @if ($eachFaq->active == 1)
                                {{ 'Active' }}
                            @else
                                {{ 'Inactive' }}
                            @endif
                        </td>
                        <td>
                            <a type="button" href="{{ route('faq.edit', $eachFaq->id) }}">edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
