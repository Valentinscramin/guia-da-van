@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Escolha as fotos para Upload</h1>
                <form method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
                        <label class="custom-file-label" for="arquivo">Escolha um arquivo</label>
                    </div>
                    <p>
                        <button type="submit" class="btn btn-primary my-2">Enviar</button>
                        <button type="reset" class="btn btn-secondary my-2">Cancelar</button>
                    </p>
                </form>
            </div>
        </section>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach ($photos as $eachPhoto)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top figure-img img-fluid rounded" src="/storage/{{ $eachPhoto->arquivo }}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-sm btn-outline-secondary"
                                            href="{{ route('photo_download', $eachPhoto->id) }}">Download</a>
                                        <form method="POST" action="/admin/photos/{{ $eachPhoto->id }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Apagar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
