@extends('layouts.appAdmin')

@section('content')
    <div class="content_middle_dashboard">
        <div class="col-11 take__header__middle">
            <div class="col-6">
                <h2>Depoimento dos <span>Clientes</span></h2>
            </div>
        </div>
        <div class="table_dashboard col-11">
            <table class="table">
                <thead>
                    <tr>
                        <th>Comentário</th>
                        <th>Status</th>
                        <th>Perfil</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($websitecomment as $eachComment)
                        <tr>
                            <td>{{ $eachComment->comment }}</td>
                            <td>
                                @if ($eachComment->active == 1)
                                    {{ 'Ativado' }}
                                @else
                                    {{ 'Desativado' }}
                                @endif
                            </td>
                            <td>
                                <a type="button" href="{{ route('profile_show', $eachComment->user_id) }}">Ver Perfil</a>
                            </td>
                            <td>
                                <a type="button"
                                    href="{{ route('web_site_comment_approve_edit', $eachComment->id) }}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        jQuery("#comentarios").addClass("active_dashboard");
    </script>
@endsection
