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
        {{ 'There is ' . $totalVans . ' vans in the system.' }}
        <br>
        {{ __('You are logged in!') }}
    </div>
</div>
@endsection