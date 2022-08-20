@extends('layouts.app')

@section('content')
    @foreach ($user->avaliation as $eachAvaliation)
        {{ $eachAvaliation->avaliation }}
    @endforeach
@endsection
