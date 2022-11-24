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

                <div>
                    @foreach ($photos as $eachPhoto)
                    <input type="radio" name="admin_announcement_photo" value="{{ $eachPhoto->id }}">

                    <div>
                        <img class="card-img-top" src="/storage/{{ $eachPhoto->arquivo }}" alt="Title">
                    </div>
                    @endforeach
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
                    <input type="text" name="site_web_route" id="site_web_route" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Rota do site</small>
                </div>

                <div class="itemInput col-12 col-sm-4">
                    <label for="active">Ativar/Desativar</label>
                    <input type="checkbox" name="active" id="active" aria-describedby="helpId" value="1">
                </div>

                <div class="col-12 btn_submit"><button type="submit">Salvar</button></div>
            </form>
        </div>
    </div>
    <script>
        jQuery("#anuncios").addClass("active_dashboard");
    </script>
    @endsection