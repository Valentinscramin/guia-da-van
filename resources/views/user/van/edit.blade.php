@extends('layouts.app')

@section('content')
    <div class="content_middle_dashboard">
        <div class="col-11 take__header__middle">
            <div class="col-12">
                <h2>Editar <span>Van</span></h2>
            </div>
        </div>
        <div class="formulario col-11">
            <form action="{{ route('van.update', $van->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="itemInput col-12">
                    @foreach ($photos as $eachPhoto)
                        @if (in_array($eachPhoto->id, $array_photos_selected))
                            <div class="col-12 col-sm-2 col-lg-1">
                                <img class="card-img-top" src="/storage/{{ $eachPhoto->arquivo }}" alt="Title">
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="btn_selecionar col-12"><a href="#" id="btn_selecionar_foto">Selecionar Foto</a></div>
                <div class="modal_album">
                    <div class="content col-12 col-md-8 col-lg-6 col-xl-5">
                        @foreach ($photos as $eachPhoto)
                            <div class="col-12 col-sm-4 col-md-3 itemPhoto">
                                @if (in_array($eachPhoto->id, $array_photos_selected))
                                    <input type="checkbox" name="van_user_photo[]" id="{{ $eachPhoto->id }}"
                                        value="{{ $eachPhoto->id }}" checked>
                                @else
                                    <input type="checkbox" name="van_user_photo[]" id="{{ $eachPhoto->id }}"
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
                    <label for="">Model</label>
                    <input type="text" name="model" id="" placeholder="" aria-describedby="helpId"
                        value="{{ $van->model }}">
                    <small id="helpId">Model</small>
                </div>
                <div class="itemInput col-12 col-sm-4">
                    <label for="">Plate</label>
                    <input type="text" name="plate" id="" placeholder="" aria-describedby="helpId"
                        value="{{ $van->plate }}">
                    <small id="helpId">Plate</small>
                </div>
                <div class="itemInput col-12 col-sm-4">
                    <label for="">Seats</label>
                    <input type="number" name="seats" id="" placeholder="" aria-describedby="helpId"
                        value="{{ $van->seats }}">
                    <small id="helpId">Seats</small>
                </div>
                <div class="itemInput col-12 col-sm-12">
                    <label for="">Comentario</label>
                    <textarea name="comment" id="" cols="30" rows="10">
                {{ $van->comment }}
                </textarea>
                </div>
                @include('user.van.tracks')

                <div class="col-12 btn_submit"><button type="submit">Atualizar Van</button></div>
            </form>
        </div>
    </div>
    <script>
        function change(element) {

            console.log(element.value)

            switch (element.value) {
                case 1:
                    $("#cidade_saida").show()
                    $("#cidade_chegada").show()
                    $("#periodo").show()
                    $("#escola").show()
                    $("#evento").hide()
                    break;
                case 2:
                    $("#cidade_saida").show()
                    $("#cidade_chegada").hide()
                    $("#periodo").hide()
                    $("#escola").hide()
                    $("#evento").show()
                    break;
                default:
                    $("#cidade_saida").show()
                    $("#cidade_chegada").hide()
                    $("#periodo").hide()
                    $("#escola").hide()
                    $("#evento").hide()
            }
        }
        jQuery("#frota").addClass("active_dashboard");
    </script>
@endsection
