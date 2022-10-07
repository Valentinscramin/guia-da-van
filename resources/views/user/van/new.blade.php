@extends('layouts.app')

@section('content')
<div class="content_middle_dashboard">
    <div class="col-12 take__header__middle">
        <div class="col-12">
            <h2>Nova <span>Van</span></h2>
        </div>
    </div>
    <div class="formulario">
        <form action="{{ route('van.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="itemInput col-12">
                @foreach ($photos as $eachPhoto)
                <input type="checkbox" name="van_user_photo[]" value="{{ $eachPhoto->id }}">
                <div class="card text-start" style="width:100px;">
                    <img class="card-img-top" src="/storage/{{ $eachPhoto->arquivo }}" alt="Title">
                </div>
                @endforeach
            </div>


            <div class="itemInput col-12 col-sm-6">
                <label>Model</label>
                <input type="text" name="model">
                <small>Model</small>
            </div>
            <div class="itemInput col-12 col-sm-6">
                <label>Plate</label>
                <input type="text" name="plate">
                <small>Plate</small>
            </div>
            <div class="itemInput col-12 col-sm-6">
                <label>Seats</label>
                <input type="number" name="seats">
                <small>Seats</small>
            </div>
            <div class="itemInput col-12">
                <label>Comentario</label>
                <textarea name="comment">
                </textarea>
            </div>
            @include('user.van.tracks')
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script>
    jQuery("#frota").addClass("active_dashboard");
</script>
@endsection