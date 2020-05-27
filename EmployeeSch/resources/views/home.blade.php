@extends('layouts.app')
@section('title', 'Dashboard')
@section('title-page', 'Dashboard')
@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    You are logged in!
    <a href="/Users" class="btn btn-lg btn-primary float-right">Manage Users</a>

@endsection
