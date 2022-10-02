@extends('layouts.appAdmin')

@section('content')
    <div>
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

            <div>
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Nome</small>
            </div>

            <div>
                <label for="url" class="form-label">Url</label>
                <input type="text" name="url" id="url" class="form-control" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Url</small>
            </div>

            <div class="mb-3">
                <label for="site_web_route" class="form-label">Rota do site</label>
                <input type="text" name="site_web_route" id="site_web_route" class="form-control" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Rota do site</small>
            </div>

            <div>
                <label for="active">Ativar/Desativar</label>
                <input type="checkbox" name="active" id="active" aria-describedby="helpId" value="1">
            </div>

            <button type="submit" >Salvar</button>
        </form>
    </div>
@endsection
