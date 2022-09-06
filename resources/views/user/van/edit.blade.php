@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('van.update', $van->id) }}" method="POST">
            @csrf
            @method('PUT')


            {{-- <div class="mb-3">
                @foreach ($photos_selected as $eachPhoto)
                    <input type="checkbox" name="van_user_photo[]" value="{{ $eachPhoto->id }}">
                    <div class="card text-start" style="width:100px;">
                        <img class="card-img-top" src="/storage/{{ $eachPhoto->arquivo }}" alt="Title">
                    </div>
                @endforeach
            </div> --}}


            <div class="mb-3">
                @foreach ($photos as $eachPhoto)
                    <input type="checkbox" name="van_user_photo[]" value="{{ $eachPhoto->id }}">
                    <div class="card text-start" style="width:100px;">
                        <img class="card-img-top" src="/storage/{{ $eachPhoto->arquivo }}" alt="Title">
                    </div>
                @endforeach
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Model</label>
                <input type="text" name="model" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $van->model }}">
                <small id="helpId" class="text-muted">Model</small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Plate</label>
                <input type="text" name="plate" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $van->plate }}">
                <small id="helpId" class="text-muted">Plate</small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Seats</label>
                <input type="number" name="seats" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $van->seats }}">
                <small id="helpId" class="text-muted">Seats</small>
            </div>
            @include('user.van.tracks')
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
