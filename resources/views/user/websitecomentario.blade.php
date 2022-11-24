@extends('layouts.app')

@section('content')
<div class="content_middle_dashboard">
    <div class="col-11 take__header__middle">
        <div class="col-12">
            <h2>Faça uma sua <span>Avaliação</span></h2>
        </div>
    </div>
    <div class="formulario col-11">
        <form action="{{ route('web_site_comment_push') }}" method="POST">
            @csrf
            @method('POST')
            <div class="itemInput col-12">
                <label>Mensagem</label>
                <textarea name="comment" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="col-12 btn_submit"><button type="submit">Salvar</button></div>
        </form>
    </div>
</div>
<script>
    jQuery("#avalie").addClass("active_dashboard");
</script>
@endsection