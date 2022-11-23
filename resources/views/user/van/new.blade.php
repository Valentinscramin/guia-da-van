@extends('layouts.app')

@section('content')
    <div class="content_middle_dashboard">
        <div class="col-11 take__header__middle">
            <div class="col-12">
                <h2>Nova <span>Van</span></h2>
            </div>
        </div>
        <div class="formulario col-11">
            <form action="{{ route('van.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="btn_selecionar col-12"><a href="#" id="btn_selecionar_foto">Selecionar Foto</a></div>
                <div class="modal_album">
                    <div class="content col-12 col-md-8 col-lg-6 col-xl-5">
                        @foreach ($photos as $eachPhoto)
                            <div class="col-12 col-sm-4 col-md-3 itemPhoto">
                                <input type="checkbox" name="van_user_photo[]" id="{{ $eachPhoto->id }}"
                                    value="{{ $eachPhoto->id }}">
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
                    <label>Modelo</label>
                    <input type="text" name="model">
                    <small>Modelo</small>
                </div>
                <div class="itemInput col-12 col-sm-4">
                    <label>Placa</label>
                    <input type="text" name="plate">
                    <small>Placa</small>
                </div>
                <div class="itemInput col-12 col-sm-4">
                    <label>Assentos</label>
                    <input type="number" name="seats">
                    <small>Assentos</small>
                </div>
                <div class="itemInput col-12">
                    <label>Comentário</label>
                    <textarea name="comment"></textarea>
                </div>
                @include('user.van.tracks')

                <div class="col-12 btn_submit"><button type="submit">Cadastrar Van</button></div>
            </form>
            <form action="{{ route('remove_track') }}" id="remove_track" method="POST">
                @csrf
                @method('GET')
            </form>
        </div>
    </div>
    <script>
        function deleteTrack(element) {
            $('<input>').attr({
                type: 'hidden',
                name: 'van_track_id',
                value: $(element).data("track")
            }).appendTo("#remove_track")

            $('<input>').attr({
                type: 'hidden',
                name: 'van',
                value: $(element).data("van")
            }).appendTo("#remove_track")

            $("#remove_track").submit()
        }

        function change(element) {

            var cardNumber = $(element).data("card");

            switch (parseInt(element.value)) {
                case 1:
                    console.log('entrou no 1')
                    $("#estado_saida_1_" + cardNumber).show()
                    $("#estado_chegada_2_" + cardNumber).show()
                    $("#cidade_saida_" + cardNumber).show()
                    $("#cidade_chegada_" + cardNumber).show()
                    $("#periodo_" + cardNumber).show()
                    $("#escola_" + cardNumber).show()
                    $("#evento_" + cardNumber).hide()
                    break;
                case 2:
                    console.log('entrou no 2')
                    $("#estado_saida_1_" + cardNumber).show()
                    $("#estado_chegada_2_" + cardNumber).hide()
                    $("#cidade_saida_" + cardNumber).show()
                    $("#cidade_chegada_" + cardNumber).hide()
                    $("#periodo_" + cardNumber).hide()
                    $("#escola_" + cardNumber).hide()
                    $("#evento_" + cardNumber).show()
                    break;
                default:
                    console.log('outros')
                    $("#estado_saida_1_" + cardNumber).show()
                    $("#estado_chegada_2_" + cardNumber).hide()
                    $("#cidade_saida_" + cardNumber).show()
                    $("#cidade_chegada_" + cardNumber).hide()
                    $("#periodo_" + cardNumber).hide()
                    $("#escola_" + cardNumber).hide()
                    $("#evento_" + cardNumber).hide()
            }
        }

        jQuery("#frota").addClass("active_dashboard");
    </script>
@endsection
