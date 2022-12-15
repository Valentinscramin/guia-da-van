@extends('layouts.appAdmin')

@section('content')
<div class="content_middle_dashboard">
    <div class="col-11 take__header__middle">
        <div class="col-6">
            <h2>Editar <span>Usuário</span></h2>
        </div>
    </div>
    <div class="formulario col-11">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="itemInput col-12 col-sm-4">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" aria-describedby="helpId" value="{{ $user->name }}" readonly>
                <!-- <small id="helpId" class="text-muted">Nome</small> -->
            </div>

            <div class="itemInput col-12 col-sm-4">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" aria-describedby="helpId" value="{{ $user->email }}" readonly>
                <!-- <small id="helpId" class="text-muted">Email</small> -->
            </div>

            <div class="itemInput col-12 col-sm-4">
                <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
                <input type="text" name="cpf_cnpj" id="cpf_cnpj" aria-describedby="helpId" value="{{ $user->cpf_cnpj }}">
                <!-- <small id="helpId" class="text-muted">CPF/CNPJ</small> -->
            </div>

            <div class="itemInput col-12 col-sm-4">
                <label for="data_nascimento" class="form-label">Data Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" aria-describedby="helpId" value="{{ $user->data_nascimento }}">
                <!-- <small id="helpId" class="text-muted">Data Nascimento</small> -->
            </div>

            <div class="itemInput col-12 col-sm-4">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" name="celular" id="celular" aria-describedby="helpId" value="{{ $user->celular }}">
                <!-- <small id="helpId" class="text-muted">Celular</small> -->
            </div>

            <div class="itemInput col-12 col-sm-4">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" id="telefone" aria-describedby="helpId" value="{{ $user->telefone }}">
                <!-- <small id="helpId" class="text-muted">Telefone</small> -->
            </div>

            <div class="itemInput activeLabel col-12 col-md-1">
                <input type="checkbox" name="active" id="active" aria-describedby="helpId" value="1" @if ($user->active == 1) {{ "checked" }} @endif>
                <label for="active" class="form-label">Ativar/Desativar</label>
            </div>
            <div class="col-12 btn_submit">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>
<script>
    jQuery("#usuarios").addClass("active_dashboard");
</script>
@endsection