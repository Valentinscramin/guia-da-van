@extends('layouts.app')

@section('content')
    <div class="content_middle_dashboard">
        <div class="col-11 take__header__middle">
            <div class="col-12">
                <h2>Editar <span>Perfil</span></h2>
            </div>
        </div>
        <div class="formulario col-11">
            <form action="{{ route('profile.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <img class="card-img-top" style="width:100px;" src="/storage/{{ $profile_photo }}" alt="Profile Image">
                <div class="btn_selecionar col-12"><a href="#" id="btn_selecionar_foto">Selecionar Foto</a></div>
                <div class="modal_album">
                    <div class="content col-12 col-md-8 col-lg-6 col-xl-5">
                        @foreach ($photos as $eachPhoto)
                            <div class="col-12 col-sm-4 col-md-3 itemPhoto">
                                @if ($profile_photo_checked == $eachPhoto->id)
                                    <input type="checkbox" name="user_profile_photo[]" id="{{ $eachPhoto->id }}"
                                        value="{{ $eachPhoto->id }}" checked>
                                @else
                                    <input type="checkbox" name="user_profile_photo[]" id="{{ $eachPhoto->id }}"
                                        value="{{ $eachPhoto->id }}">
                                @endif
                                <label for="{{ $eachPhoto->id }}">
                                    <div
                                        style="background: url('<?php echo URL('storage/' . $eachPhoto->arquivo); ?>')no-repeat top center; background-size: cover; width: 150px; height: 150px;">
                                    </div>
                                </label>
                            </div>
                        @endforeach
                        <div class="btn_cadastre salvar_modal_album col-12"><a href="#">Salvar</a></div>
                    </div>
                </div>

                <div class="itemInput col-12 col-sm-4">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" placeholder="" aria-describedby="helpId"
                        value="{{ $user->name }}">
                    <small id="helpId" class="text-muted">Nome</small>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="itemInput col-12 col-sm-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" placeholder="" aria-describedby="helpId"
                        value="{{ $user->email }}" readonly>
                    <small id="helpId" class="text-muted">Email</small>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="itemInput col-12 col-sm-4">
                    <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
                    <input type="text" name="cpf_cnpj" id="cpf_cnpj" placeholder="" aria-describedby="helpId_cpf_cnpj"
                        value="{{ $user->cpf_cnpj }}" onkeyup="validar(this);">
                    <small id="helpId_cpf_cnpj" class="text-muted">CPF/CNPJ</small>
                    @error('cpf_cnpj')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="itemInput col-12 col-sm-4 col-md-3">
                    <label for="data_nascimento" class="form-label">Data Nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" placeholder=""
                        aria-describedby="helpId" value="{{ $user->data_nascimento }}">
                    <small id="helpId" class="text-muted">Data Nascimento</small>
                    @error('data_nascimento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="itemInput col-12 col-sm-4 col-md-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" name="celular" id="celular" placeholder="" aria-describedby="helpId"
                        value="{{ $user->celular }}">
                    <small id="helpId" class="text-muted">Celular</small>
                    @error('celular')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="itemInput col-12 col-sm-4 col-md-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" id="telefone" placeholder="" aria-describedby="helpId"
                        value="{{ $user->telefone }}">
                    <small id="helpId" class="text-muted">Telefone</small>
                    @error('telefone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="itemInput col-12 col-sm-4 col-md-3">
                    <label for="postcode" class="form-label">CEP</label>
                    <input type="text" name="postcode" id="postcode" placeholder="" aria-describedby="helpId"
                        value="{{ $user->postcode }}">
                    <small id="helpId" class="text-muted">Cep</small>
                    @error('postcode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12 btn_submit"><button type="submit">Atualizar Perfil</button></div>
            </form>
        </div>

    </div>
    <script>
        jQuery("#configuracoes").addClass("active_dashboard");

        $("#postcode").mask("99.999-999");
        $("#telefone").mask("(99)9999-9999");
        $("#celular").mask("(99)99999-9999");

        function validar(obj) {
            // recebe um objeto
            var s = (obj.value).replace(/\D/g, '');
            var tam = (s).length; // removendo os caracteres nãoo numéricos
            if (!(tam == 11 || tam == 14 || tam == 0)) { // validando o tamanho
                obj.focus();
                return false;
            }

            // se for CPF
            if (tam == 11) {
                if (!validaCPF(s)) { // chama a função que valida o CPF
                    obj.style.color = "red";
                    document.getElementById('helpId_cpf_cnpj').innerHTML = "CPF digitado não esta correto";
                    document.getElementById('botao-salvar').disabled = true;
                    obj.select(); // se quiser selecionar o campo em questão
                    obj.focus();
                    return false;
                }
                obj.style.color = "";
                document.getElementById('helpId_cpf_cnpj').innerHTML = "CPF/CNPJ";
                document.getElementById('botao-salvar').disabled = false;
                obj.value = maskCPF(s); // se validou o CPF mascaramos corretamente
                return true;
            }

            // se for CNPJ
            if (tam == 14) {
                if (!validaCNPJ(s)) { // chama a função que valida o CNPJ
                    obj.style.color = "red";
                    document.getElementById('helpId_cpf_cnpj').innerHTML = "CNPJ digitado não esta correto";
                    document.getElementById('botao-salvar').disabled = true;
                    obj.select(); // se quiser selecionar o campo enviado
                    obj.focus();
                    return false;
                }
                obj.style.color = "";
                document.getElementById('helpId_cpf_cnpj').innerHTML = "CPF/CNPJ";
                document.getElementById('botao-salvar').disabled = false;
                obj.value = maskCNPJ(s); // se validou o CNPJ mascaramos corretamente
                return true;
            }
        }

        function validaCPF(s) {
            var c = s.substr(0, 9);
            var dv = s.substr(9, 2);
            var d1 = 0;
            for (var i = 0; i < 9; i++) {
                d1 += c.charAt(i) * (10 - i);
            }
            if (d1 == 0)
                return false;
            d1 = 11 - (d1 % 11);
            if (d1 > 9)
                d1 = 0;
            if (dv.charAt(0) != d1) {
                return false;
            }
            d1 *= 2;
            for (var i = 0; i < 9; i++) {
                d1 += c.charAt(i) * (11 - i);
            }
            d1 = 11 - (d1 % 11);
            if (d1 > 9)
                d1 = 0;
            if (dv.charAt(1) != d1) {
                return false;
            }
            return true;
        }

        function validaCNPJ(CNPJ) {
            var a = new Array();
            var b = new Number;
            var c = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
            for (i = 0; i < 12; i++) {
                a[i] = CNPJ.charAt(i);
                b += a[i] * c[i + 1];
            }
            if ((x = b % 11) < 2) {
                a[12] = 0
            } else {
                a[12] = 11 - x
            }
            b = 0;
            for (y = 0; y < 13; y++) {
                b += (a[y] * c[y]);
            }
            if ((x = b % 11) < 2) {
                a[13] = 0;
            } else {
                a[13] = 11 - x;
            }
            if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])) {
                return false;
            }
            return true;
        }

        function maskCPF(CPF) {
            return CPF.substring(0, 3) + "." + CPF.substring(3, 6) + "." + CPF.substring(6, 9) + "-" + CPF.substring(9, 11);
        }

        function maskCNPJ(CNPJ) {
            return CNPJ.substring(0, 2) + "." + CNPJ.substring(2, 5) + "." + CNPJ.substring(5, 8) + "/" + CNPJ.substring(8,
                12) + "-" + CNPJ.substring(12, 14);
        }
    </script>
@endsection
