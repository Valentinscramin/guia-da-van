@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('profile.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control" placeholder=""
                    aria-describedby="helpName" value="{{ $user->name }}">
                <small id="helpName" class="text-muted">Nome</small>
            </div>
            <div class="mb-3">
                <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
                <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control" placeholder=""
                    aria-describedby="helpCpfCnpj" value="{{ $user->cpf_cnpj }}">
                <small id="helpCpfCnpj" class="text-muted">Cpf ou Cnpj</small>
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" placeholder=""
                    aria-describedby="helpDate" value="{{ $user->data_nascimento }}">
                <small id="helpDate" class="text-muted">Sua data de nascimento</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
