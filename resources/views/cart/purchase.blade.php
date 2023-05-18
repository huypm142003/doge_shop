@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="container">
        <div class="box">
            <div class="breadcumb">
                <a href="{{ route('home.index') }}">home</a>
                <span><i class='bx bxs-chevrons-right'></i></span>
                <a href="{{ route('cart.purchase') }}">purchase</a>
            </div>
        </div>
        <div class="video-purchase">
            <h1>
                Congratulations, purchase complete!!!
            </h1>
            <video autoPlay loop>
                <source src="{{ asset('img/purchase.mp4') }}" type="video/mp4" style="border-radius: 5px" />
            </video>
            <h1>
                Please wait for us to deliver to you
                <span class="heart"> ♥</span>
            </h1>
        </div>
    </div>
@endsection
