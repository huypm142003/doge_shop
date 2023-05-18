@extends('layouts.admin');
@section('title', $viewData['title'])
@section('content')
    <div class="home-admin">
        <img src="{{ asset('/img/admin-bg.jpeg') }}" alt="Snow">
        <div class="centered">Welcome to Admin DogeShop</div>
    </div>
@endsection
