@extends('layouts.app')

@section('content')
    <div class="container">
        @if (is_null(Auth::user()->cpf_cnpj))
            <br>
            <div class="alert alert-warning mx-auto" role="alert">
                Deseja cadastrar sua primeira van e poder fazer upload de imagens? Preencha todos os dados do seu <a
                    href="{{ URL('/user/profile') }}">perfil</a>.
            </div>
        @endif
        @if (session('status'))
            <br>
            <div class="alert alert-success mx-auto" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <script>
        jQuery("#dashboard").addClass("active_dashboard");
    </script>
@endsection
