@extends('layouts.appAdmin')

@section('content')
    <form action="{{ route('faq.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Question</label>
        <input type="text" name="question" id="question" value="{{ $faq->question }}">
        <label>Answer</label>
        <textarea name="answer">{{ $faq->answer }}</textarea>
        <label>Ativar/Desativar</label>
        <input type="checkbox" name="active"value="1"
            @if ($faq->active == 1) {{ 'checked' }} @endif>
        <button type="submit">Salvar</button>
    </form>
@endsection
