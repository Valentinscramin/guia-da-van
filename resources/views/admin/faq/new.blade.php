@extends('layouts.appAdmin')

@section('content')
    <form action="{{ route('faq.store') }}" method="POST">
        @csrf
        @method('POST');
        <label>Question</label>
        <input type="text" name="question" id="question">

        <label>Answer</label>
        <textarea name="answer"></textarea>

        <label>Ativar/Desativar</label>
        <input type="checkbox" name="active" id="active">
        <button type="submit">Salvar</button>
    </form>
    </div>
@endsection
