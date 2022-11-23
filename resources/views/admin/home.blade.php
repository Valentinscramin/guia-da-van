@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row no-gutters">
        <!-- Dashboard - Administrador -->
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <!-- {{ 'Total de ' . $totalVans . ' vans cadastradas nos sistemas.' }} -->
        <br>
        <!-- {{ __('You are logged in!') }} -->
    </div>
</div>
<script>
    jQuery("#dashboard").addClass("active_dashboard");
</script>
@endsection