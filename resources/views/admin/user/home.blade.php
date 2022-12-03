@extends('layouts.appAdmin')

@section('content')
    <div class="content_middle_dashboard">
        <div class="col-11 take__header__middle">
            <div class="col-12">
                <h2>Todos os <span>Usuários</span></h2>
            </div>
        </div>
        <div class="table_dashboard col-11">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Perfil</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $eachUser)
                        <tr>
                            <td>{{ $eachUser->name }}</td>
                            <td>
                                @if ($eachUser->active == 1)
                                    {{ 'Ativado' }}
                                @else
                                    {{ 'Desativado' }}
                                @endif
                            </td>
                            <td>
                                <a type="button" href="{{ route('profile_show', $eachUser->id) }}">Ver Perfil</a>
                            </td>
                            <td>
                                <a type="button" href="{{ route('user.edit', $eachUser->id) }}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>{{ $users->links() }}</div>
    <script>
        jQuery("#usuarios").addClass("active_dashboard");
    </script>
@endsection
