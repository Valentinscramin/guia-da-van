@extends('layouts.app')

@section('content')
    <div class="content_middle_dashboard">
        <div class="col-11 take__header__middle">
            <div class="col-12">
                <h2>Album de <span>Fotos</span></h2>
            </div>
        </div>
        <div class="formulario col-11">
            <h1 class="heading_text">Escolha as fotos para Upload</h1>
            <center>
                <img id="pic" class="figure-img img-fluid rounded image-preview" />
            </center>
            <form method="POST" action="{{ route('user.photos.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="itemInput col-12">
                    <div class="upload_take_input">
                        <div class="image_upload"> <img src="{{ URL('/images/upload.svg') }}" alt=""
                                class="img-fluid"></div>
                        <input type="file" id="arquivo" name="arquivo" class="upload_file_input"
                            oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                        <!-- <label class="label_upload" for="arquivo">Escolha um arquivo</label> -->
                    </div>
                </div>
                <div class="col-12 col-md-10 col-lg-8 col-xl-6 btns">
                    <div class="col-12 col-md-6 btn_cancel">
                        <button type="reset" onclick="hidepic()">Cancelar</button>
                    </div>
                    <div class="col-12 col-md-6 btn_submit">
                        <button type="submit" onclick="showpic()">Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="album col-11">
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
                                        <form method="POST" action="/user/photos/{{ $eachPhoto->id }}">
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
        function showpic() {
            $("#pic").show();
        }

        function hidepic() {
            $("#pic").hide();
        }

        jQuery("#midia").addClass("active_dashboard");
    </script>
@endsection
