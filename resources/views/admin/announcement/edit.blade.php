@extends('layouts.appAdmin')

@section('content')
<div class="content_middle_dashboard">
    <div class="col-11 take__header__middle">
        <div class="col-12">
            <h2>Editar <span>Anúncio</span></h2>
        </div>
    </div>
    <div class="formulario col-11">
        <form action="{{ route('announcement.update', $announcement->id) }}" method="POST">
          
            <div class="btn_selecionar col-12"><a href="#" id="btn_selecionar_foto">Selecionar Foto</a></div>
            <div class="modal_album">
                <div class="content col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="closeModal col-12"><img src="{{ URL('/images/close_modal.svg') }}" alt=""></div>
                    <div class="itemInput col-12">
                        @foreach ($photos as $eachPhoto)
                        @if ($announcement_photo_checked == $eachPhoto->id)
                        <input type="radio" name="admin_announcement_photo" value="{{ $eachPhoto->id }}" checked="checked">
                        @else
                        <input type="radio" name="admin_announcement_photo" value="{{ $eachPhoto->id }}">
                        @endif
                        <div class="card text-start" style="width:100px;">
                            <img class="card-img-top" src="/storage/{{ $eachPhoto->arquivo }}" alt="Title">
                        </div>
                        @endforeach
                    </div>
                    <div class="btn_cadastre salvar_modal_album col-12"><a href="#">Salvar</a></div>
                </div>
            </div>
            <div class="itemInput col-12 col-sm-4">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" aria-describedby="helpId" value="{{ $announcement->name }}">
                <!-- <small id="helpId" class="text-muted">Nome</small> -->
            </div>

            <div class="itemInput col-12 col-sm-4">
                <label for="name">Url</label>
                <input type="text" name="url" id="url" aria-describedby="helpId" value="{{ $announcement->url }}">
                <!-- <small id="helpId" class="text-muted">Url</small> -->
            </div>

            <div class="itemInput col-12 col-sm-4">
                <label for="site_web_route">Rota do site</label>
                <select name="site_web_route" id="site_web_route">
                    <option value="/home" @if($announcement->site_web_route == '/home') selected @endif>Home</option>
                </select>
                <!-- <small id="helpId" class="col-12 text-muted" style="text-align: center;">Rota do site</small> -->
            </div>

            <div class="itemInput activeLabel col-12 col-md-1">
                <input type="checkbox" name="active" id="active" aria-describedby="helpId" value="1" @if ($announcement->active == 1) {{ "checked" }} @endif>
                <label for="active">Ativar/Desativar</label>
            </div>

            <div class="col-12 btn_submit"><button type="submit">Salvar</button></div>
        </form>
    </div>
</div>
@endsection