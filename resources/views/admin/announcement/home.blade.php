@extends('layouts.appAdmin')

@section('content')
    <div class="content_middle_dashboard">
        <div class="col-11 take__header__middle">
            <div class="col-6">
                <h2>Todos os <span>Anúncios</span></h2>
            </div>
            <div class="btn_register col-6"> <a href="{{ route('announcement.create') }}">Criar novo</a></div>
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
                    @foreach ($announcement as $eachAnnouncement)
                        <tr>
                            <td>{{ $eachAnnouncement->name }}</td>
                            <td>{{ $eachAnnouncement->url }}</td>
                            <td>
                                @if ($eachAnnouncement->active == 1)
                                    {{ 'Ativado' }}
                                @else
                                    {{ 'Desativado' }}
                                @endif
                            </td>
                            <td>
                                <a type="button" href="{{ route('announcement.edit', $eachAnnouncement->id) }}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $announcement->links() }}
            </div>
        </div>
    </div>
    <script>
        jQuery("#anuncios").addClass("active_dashboard");
    </script>
@endsection
