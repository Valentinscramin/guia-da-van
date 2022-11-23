@extends('layouts.appAdmin')

@section('content')
<div class="content_middle_dashboard">
    <div class="col-11 take__header__middle">
        <div class="col-12">
            <h2>Cadastrar <span>FAQ</span></h2>
        </div>
    </div>
    <div class="formulario col-11">
        <form action="{{ route('faq.store') }}" method="POST">
            @csrf
            @method('POST');
            <div class="itemInput col-12">
                <label>Pergunta</label>
                <input type="text" name="question" id="question">
            </div>
            <div class="itemInput col-12">
                <label>Resposta</label>
                <textarea name="answer"></textarea>
            </div>
            <div class="itemInput col-12 col-sm-4">
                <label>Ativar/Desativar</label>
                <input type="checkbox" name="active" id="active">
            </div>
            <div class="col-12 btn_submit"><button type="submit">Salvar</button></div>
        </form>
    </div>
</div>
<script>
    jQuery("#ajuda").addClass("active_dashboard");
</script>
@endsection