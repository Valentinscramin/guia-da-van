@extends('layouts.appAdmin')

@section('content')
<div class="content_middle_dashboard">
    <div class="col-11 take__header__middle">
        <div class="col-12">
            <h2>Todos os <span>Trajetos</span></h2>
        </div>
    </div>
    <div class="table_dashboard col-11">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tracks as $eachTrack)
                <tr>
                    <td>{{ $eachTrack->name }}</td>
                    <td>
                        @if ($eachTrack->active == 1)
                        {{ 'Ativado' }}
                        @else
                        {{ 'Desativado' }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    jQuery("#trajetos").addClass("active_dashboard");
</script>
@endsection