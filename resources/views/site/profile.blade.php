@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/storage/{{ $profile_photo }}" alt="Foto do perfil do usuario {{ $user->name }}">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->cpf_cnpj }}</p>
        <p>{{ $user->celular }}</p>
        <p>{{ $user->telefone }}</p>
        @if (isset(Auth::user()->id))
            <div style="display: flex; justify-content:space-around; width: 250px;">
                <form action="{{ route('avaliation.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="avaliation" value="1">
                    <input type="hidden" name="user_create" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">
                        <span class="fa fa-star @if ($stars['one']) {{ 'checked' }} @endif"></span>
                    </button>
                </form>
                <form action="{{ route('avaliation.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="avaliation" value="2">
                    <input type="hidden" name="user_create" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">
                        <span class="fa fa-star @if ($stars['two']) {{ 'checked' }} @endif"></span>
                    </button>
                </form>
                <form action="{{ route('avaliation.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="avaliation" value="3">
                    <input type="hidden" name="user_create" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">
                        <span class="fa fa-star @if ($stars['three']) {{ 'checked' }} @endif"></span>
                    </button>
                </form>
                <form action="{{ route('avaliation.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="avaliation" value="4">
                    <input type="hidden" name="user_create" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">
                        <span class="fa fa-star @if ($stars['four']) {{ 'checked' }} @endif"></span>
                    </button>
                </form>
                <form action="{{ route('avaliation.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="avaliation" value="5">
                    <input type="hidden" name="user_create" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary">
                        <span class="fa fa-star @if ($stars['five']) {{ 'checked' }} @endif"></span>
                    </button>
                </form>
            </div>
        @else
            <span class="fa fa-star @if ($stars['one']) {{ 'checked' }} @endif"></span>
            <span class="fa fa-star @if ($stars['two']) {{ 'checked' }} @endif"></span>
            <span class="fa fa-star @if ($stars['three']) {{ 'checked' }} @endif"></span>
            <span class="fa fa-star @if ($stars['four']) {{ 'checked' }} @endif"></span>
            <span class="fa fa-star @if ($stars['five']) {{ 'checked' }} @endif"></span>
        @endif
        <br>
        @foreach ($user->comment as $eachComment)
            {{ $eachComment->comment }}
        @endforeach
    </div>
@endsection
