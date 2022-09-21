@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('van.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                @foreach ($photos as $eachPhoto)
                    <input type="checkbox" name="van_user_photo[]" value="{{ $eachPhoto->id }}">
                    <div class="card text-start" style="width:100px;">
                        <img class="card-img-top" src="/storage/{{ $eachPhoto->arquivo }}" alt="Title">
                    </div>
                @endforeach
            </div>


            <div>
                <label>Model</label>
                <input type="text" name="model">
                <small>Model</small>
            </div>
            <div>
                <label>Plate</label>
                <input type="text" name="plate">
                <small>Plate</small>
            </div>
            <div>
                <label>Seats</label>
                <input type="number" name="seats">
                <small>Seats</small>
            </div>
            <div>
                <label>Comentario</label>
                <textarea name="comment">
                </textarea>
            </div>
            @include('user.van.tracks')
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
