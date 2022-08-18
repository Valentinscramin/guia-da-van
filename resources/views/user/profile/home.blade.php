@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('profile.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $user->name }}">
                <small id="helpId" class="text-muted">Nome</small>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $user->email }}" readonly>
                <small id="helpId" class="text-muted">Email</small>
            </div>

            <div class="mb-3">
                <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
                <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $user->cpf_cnpj }}" readonly>
                <small id="helpId" class="text-muted">CPF/CNPJ</small>
            </div>

            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $user->data_nascimento }}" readonly>
                <small id="helpId" class="text-muted">Data Nascimento</small>
            </div>

            <div class="mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" name="celular" id="celular" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $user->celular }}">
                <small id="helpId" class="text-muted">Celular</small>
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $user->telefone }}">
                <small id="helpId" class="text-muted">Telefone</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
