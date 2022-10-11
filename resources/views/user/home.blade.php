@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row no-gutters">
        <!-- {{ __('Dashboard') }} -->

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <!-- {{ __('You are logged in!') }} -->
    </div>
</div>
<script>
    jQuery("#dashboard").addClass("active_dashboard");
</script>
@endsection
