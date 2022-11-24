@extends('layouts.appAdmin')

@section('content')
<div class="content_middle_dashboard">
    <div class="col-11 take__header__middle">
        <div class="col-12">
            <h2>Album de <span>Fotos</span></h2>
        </div>
    </div>
    <div class="formulario col-11">
        <h1 class="heading_text">Escolha as fotos para Upload</h1>
        <form method="POST" action="{{ route('admin.photos.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="itemInput col-12">
                <div class="upload_take_input">
                    <div class="image_upload"> <img src="{{ URL('/images/upload.svg') }}" alt="" class="img-fluid"></div>
                    <input type="file" id="arquivo" name="arquivo" class="upload_file_input">
                    <!-- <label class="label_upload" for="arquivo">Escolha um arquivo</label> -->
                </div>
            </div>
            <div class="col-12 col-md-10 col-lg-8 col-xl-6 btns">
                <div class="col-12 col-md-6 btn_cancel">
                    <button type="reset">Cancelar</button>
                </div>

                <div class="col-12 col-md-6 btn_submit">
                    <button type="submit">Enviar</button>
                </div>
            </div>

        </form>
    </div>


    <div class="album col-11">
        <div class="row">
            @foreach ($photos as $eachPhoto)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card mb-4 shadow-sm">

                    <div class="imagem">
                        <div class="bg" style="background: url('<?php echo URL('storage/' . $eachPhoto->arquivo); ?>')no-repeat top center; background-size: cover; width: 100%; height: 150px;"></div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('photo_download', $eachPhoto->id) }}">Download</a>
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
<script>
    jQuery("#midia").addClass("active_dashboard");
</script>
@endsection