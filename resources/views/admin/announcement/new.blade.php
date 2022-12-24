@extends('layouts.appAdmin')

@section('content')
<div>
    <div class="content_middle_dashboard">
        <div class="col-11 take__header__middle">
            <div class="col-12">
                <h2>Cadastrar novo <span>Anúncio</span></h2>
            </div>
        </div>
        <div class="formulario col-11">
            <form action="{{ route('announcement.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="btn_selecionar col-12"><a href="#" id="btn_selecionar_foto">Selecionar Foto</a></div>
                <div class="modal_album">
                    <div class="content col-11 col-md-8 col-lg-6 col-xl-5">
                        <div class="closeModal col-12"><img src="{{ URL('/images/close_modal.svg') }}" alt=""></div>
                        @foreach ($photos as $eachPhoto)
                        <input type="radio" name="admin_announcement_photo" value="{{ $eachPhoto->id }}">

                        <div>
                            <img class="card-img-top" src="/storage/{{ $eachPhoto->arquivo }}" alt="Title">
                        </div>
                        @endforeach
                        <div class="btn_cadastre salvar_modal_album col-12"><a href="#">Salvar</a></div>
                    </div>
                </div>


                <div class="itemInput col-12 col-sm-4">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Nome</small>
                </div>


                <div class="itemInput col-12 col-sm-4">
                    <label for="url" class="form-label">Url</label>
                    <input type="text" name="url" id="url" aria-describedby="helpId">
                    <small id="helpId" class="col-12 text-muted" style="text-align: center;">Url</small>
                </div>

                <div class="itemInput col-12 col-sm-4">
                    <label for="site_web_route" class="form-label">Rota do site</label>
                    <select class="form-select" name="site_web_route" id="site_web_route">
                        <option value="/home">Home</option>
                    </select>
                    <small id="helpId" class="col-12 text-muted" style="text-align: center;">Rota do site</small>
                </div>

                <div class="itemInput activeLabel col-12 col-sm-4">
                    <input type="checkbox" name="active" id="active" aria-describedby="helpId" value="1">
                    <label for="active">Ativar/Desativar</label>
                </div>

                <div class="col-12 btn_submit"><button type="submit">Salvar</button></div>
            </form>
        </div>
    </div>
    <script>
        jQuery("#anuncios").addClass("active_dashboard");
    </script>
    @endsection