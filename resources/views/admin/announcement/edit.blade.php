@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <form action="{{ route('announcement.update', $announcement->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
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

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId"
                    value="{{ $announcement->name }}">
                <small id="helpId" class="text-muted">Nome</small>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Url</label>
                <input type="text" name="url" id="name" class="form-control" aria-describedby="helpId"
                    value="{{ $announcement->url }}">
                <small id="helpId" class="text-muted">Url</small>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Rota do site</label>
                <input type="text" name="site_web_route" id="name" class="form-control" aria-describedby="helpId"
                    value="{{ $announcement->site_web_route }}">
                <small id="helpId" class="text-muted">Rota do site</small>
            </div>
            
            <div class="mb-3">
                <label for="active" class="form-label">Ativar/Desativar</label>
                <input type="checkbox" name="active" id="active" aria-describedby="helpId" value="1" @if ($announcement->active == 1) {{ "checked" }} @endif>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
