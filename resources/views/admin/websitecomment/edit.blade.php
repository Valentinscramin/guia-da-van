@extends('layouts.appAdmin')

@section('content')
<div class="content_middle_dashboard">
    <div class="col-11 take__header__middle">
        <div class="col-6">
            <h2>Editar <span>Depoimentos</span></h2>
        </div>
    </div>
    <div class="formulario col-11">
        <form action="{{ route('web_site_comment_approve_update', $webSiteCommentSelected->id) }}" method="POST">
            @csrf
            @method('POST')
            <div class="itemInput col-12">
                <label>Nome</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" readonly>
                <a href="{{ route('user.edit', $user->id) }}">editar usuario</a>
            </div>
            <div class="itemInput col-12">
                <label>Comentario</label>
                <textarea name="comment">
                {{ $webSiteCommentSelected->comment }}
                </textarea>
            </div>
            <div class="itemInput col-12">
                <label>Ativar/Desativar</label>
                <input type="checkbox" name="active" id="active" value="1" @if ($webSiteCommentSelected->active == 1) {{ 'checked' }} @endif>
            </div>
            <div class="col-12 btn_submit">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>
<script>
    jQuery("#comentarios").addClass("active_dashboard");
</script>
@endsection