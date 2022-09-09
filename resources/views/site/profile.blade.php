@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/storage/{{ $profile_photo }}" alt="Foto do perfil do usuario {{ $user->name }}">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->cpf_cnpj }}</p>
        <p>{{ $user->celular }}</p>
        <p>{{ $user->telefone }}</p>
        <form action="">
            <span class="fa fa-star @if($stars['one'] == true){{ "checked" }}@endif"></span>
            <span class="fa fa-star @if($stars['one'] == true){{ "checked" }}@endif"></span>
            <span class="fa fa-star @if($stars['one'] == true){{ "checked" }}@endif"></span>
            <span class="fa fa-star @if($stars['one'] == true){{ "checked" }}@endif"></span>
            <span class="fa fa-star @if($stars['one'] == true){{ "checked" }}@endif"></span>
        </form>
        @foreach ($user->comment as $eachComment)
            {{ $eachComment->comment }}
        @endforeach
    </div>
@endsection
