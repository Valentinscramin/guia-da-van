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
            @csrf
            @method('PUT')

            <div class="itemInput col-12 col-sm-4">
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

            <div class="itemInput col-12 col-sm-4">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" aria-describedby="helpId" value="{{ $announcement->name }}">
                <small id="helpId" class="text-muted">Nome</small>
            </div>

            <div class="itemInput col-12 col-sm-4">
                <label for="name">Url</label>
                <input type="text" name="url" id="name" aria-describedby="helpId" value="{{ $announcement->url }}">
                <small id="helpId" class="text-muted">Url</small>
            </div>

            <div class="itemInput col-12 col-sm-4">
                <label for="name">Rota do site</label>
                <input type="text" name="site_web_route" id="name" aria-describedby="helpId" value="{{ $announcement->site_web_route }}">
                <small id="helpId" class="text-muted">Rota do site</small>
            </div>

            <div class="itemInput col-12 col-sm-4">
                <label for="active">Ativar/Desativar</label>
                <input type="checkbox" name="active" id="active" aria-describedby="helpId" value="1" @if ($announcement->active == 1) {{ "checked" }} @endif>
            </div>

            <div class="col-12 btn_submit"><button type="submit">Salvar</button></div>
        </form>
    </div>
</div>
@endsection