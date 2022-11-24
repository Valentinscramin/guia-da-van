@extends('layouts.appAdmin')

@section('content')
<div class="content_middle_dashboard">
    <div class="col-11 take__header__middle">
        <div class="col-6">
            <h2>Todos as <span>Perguntas</span></h2>
        </div>
        <div class="btn_register col-6"> <a href="{{ route('faq.create') }}">Criar nova</a></div>
    </div>

    <div class="table_dashboard col-11">
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Url</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faq as $eachFaq)
                <tr>
                    <td>{{ $eachFaq->question }}</td>
                    <td>
                        @if ($eachFaq->active == 1)
                        {{ 'Ativado' }}
                        @else
                        {{ 'Desativado' }}
                        @endif
                    </td>
                    <td>
                        <a type="button" href="{{ route('faq.edit', $eachFaq->id) }}">edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    jQuery("#ajuda").addClass("active_dashboard");
</script>
@endsection