@extends('layouts.app')

@section('content')
    <div class="container">
        <img class="card-img-top" style="width:100px;" src="/storage/{{ $profile_photo }}" alt="Profile Image">
        <form action="{{ route('profile.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                @foreach ($photos as $eachPhoto)
                    @if ($profile_photo_checked == $eachPhoto->id)
                        <input type="radio" name="user_profile_photo" value="{{ $eachPhoto->id }}" checked="checked">
                    @else
                        <input type="radio" name="user_profile_photo" value="{{ $eachPhoto->id }}">
                    @endif
                    <div class="card text-start" style="width:100px;">
                        <img class="card-img-top" src="/storage/{{ $eachPhoto->arquivo }}" alt="Title">
                    </div>
                @endforeach
            </div>

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
                    aria-describedby="helpId" value="{{ $user->cpf_cnpj }}">
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

            <div class="mb-3">
                <label for="postcode" class="form-label">CEP</label>
                <input type="text" name="postcode" id="postcode" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $user->postcode }}">
                <small id="helpId" class="text-muted">Cep</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        $("#cpf_cnpj").keydown(function() {
            try {
                $("#cpf_cnpj").unmask();
            } catch (e) {}

            var tamanho = $("#cpf_cnpj").val().length;

            if (tamanho < 11) {
                $("#cpf_cnpj").mask("999.999.999-99");
            } else {
                $("#cpf_cnpj").mask("99.999.999/9999-99");
            }

            // ajustando foco
            var elem = this;
            setTimeout(function() {
                // mudo a posição do seletor
                elem.selectionStart = elem.selectionEnd = 10000;
            }, 0);
            // reaplico o valor para mudar o foco
            var currentValue = $(this).val();
            $(this).val('');
            $(this).val(currentValue);
        });
    </script>
@endsection
