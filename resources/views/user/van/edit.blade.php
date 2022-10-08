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
                <div style="width:100px;">
                    <img class="card-img-top" src="/storage/{{ $eachPhoto->arquivo }}" alt="Title">
                </div>
                @endif
                @endforeach
            </div>

            <div class="itemInput col-12 col-sm-12">
                @foreach ($photos as $eachPhoto)
                @if (in_array($eachPhoto->id, $array_photos_selected))
                <input type="checkbox" name="van_user_photo[]" value="{{ $eachPhoto->id }}" checked>
                @else
                <input type="checkbox" name="van_user_photo[]" value="{{ $eachPhoto->id }}">
                @endif
                <div style="width:100px;">
                    <img class="card-img-top" src="/storage/{{ $eachPhoto->arquivo }}" alt="Title">
                </div>
                @endforeach
            </div>


            <div class="itemInput col-12 col-sm-4">
                <label for="">Model</label>
                <input type="text" name="model" id="" placeholder="" aria-describedby="helpId" value="{{ $van->model }}">
                <small id="helpId">Model</small>
            </div>
            <div class="itemInput col-12 col-sm-4">
                <label for="">Plate</label>
                <input type="text" name="plate" id="" placeholder="" aria-describedby="helpId" value="{{ $van->plate }}">
                <small id="helpId">Plate</small>
            </div>
            <div class="itemInput col-12 col-sm-4">
                <label for="">Seats</label>
                <input type="number" name="seats" id="" placeholder="" aria-describedby="helpId" value="{{ $van->seats }}">
                <small id="helpId">Seats</small>
            </div>
            <div class="itemInput col-12 col-sm-12">
                <label for="">Comentario</label>
                <textarea name="comment" id="" cols="30" rows="10">
                {{ $van->comment }}
                </textarea>
            </div>
            @include('user.van.tracks')
            <div class="col-12 btn_submit"><button type="submit">Editar</button></div>
        </form>
    </div>
</div>
<script>
    jQuery("#frota").addClass("active_dashboard");
</script>
@endsection