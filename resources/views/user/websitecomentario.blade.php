@extends('layouts.app')

@section('content')
    <form action="{{ route('web_site_comment_push') }}" method="POST">
        @csrf
        @method('POST')
        <textarea name="comment" id="" cols="30" rows="10"></textarea>
        <button type="submit">Salvar</button>
    </form>
@endsection
