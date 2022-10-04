@extends('layouts.appAdmin')

@section('content')
    <div>
        <form action="{{ route('web_site_comment_approve_update', $webSiteCommentSelected->id) }}" method="POST">
            @csrf
            @method('POST')

            <label>Nome</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" readonly>
            <a href="{{ route('user.edit', $user->id) }}">editar usuario</a>

            <label>Comentario</label>
            <textarea name="comment">
                {{ $webSiteCommentSelected->comment }}
            </textarea>

            <label>Ativar/Desativar</label>
            <input type="checkbox" name="active" id="active" value="1"
                @if ($webSiteCommentSelected->active == 1) {{ 'checked' }} @endif>

            <button type="submit">Salvar</button>
        </form>
    </div>
@endsection
