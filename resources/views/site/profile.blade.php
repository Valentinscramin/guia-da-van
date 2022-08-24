@extends('layouts.app')

@section('content')
    {{-- @dump($user->avaliation)
    @dd($user->comment) --}}
    {{-- @foreach ($user->avaliation as $eachAvaliation)
        {{ $eachAvaliation->id }}
    @endforeach --}}
    <div class="container">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->cpf_cnpj }}</p>
        <p>{{ $user->celular }}</p>
        <p>{{ $user->telefone }}</p>
        <p>{{ $user->everage }}</p>
        @foreach ($user->comment as $eachComment)
            {{ $eachComment->comment }}
        @endforeach
    </div>
@endsection
