@extends('layouts.appAdmin')

@section('content')
<div class="content_middle_dashboard">
    <div class="col-11 take__header__middle">
        <div class="col-6">
            <h2>Editar <span>FAQ</span></h2>
        </div>
    </div>
    <div class="formulario col-11">
        <form action="{{ route('faq.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="itemInput col-12">
                <label>Pergunta</label>
                <input type="text" name="question" id="question" value="{{ $faq->question }}" style="width: 98%;">
            </div>
            <div class="itemInput col-12">
                <label>Resposta</label>
                <textarea name="answer">{{ $faq->answer }}</textarea>
            </div>
            <div class="itemInput activeLabel col-12 col-sm-1">
                <input type="checkbox" name="active" value="1" @if ($faq->active == 1) {{ 'checked' }} @endif>
                <label>Ativar/Desativar</label>
            </div>
            <div class="col-12 btn_submit"><button type="submit">Salvar</button></div>
        </form>
    </div>
</div>
<script>
    jQuery("#ajuda").addClass("active_dashboard");
</script>
@endsection