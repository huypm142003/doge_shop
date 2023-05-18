@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="box">
            <div class="breadcumb">
                <a href="{{ route('home.index') }}">home</a>
                <span><i class='bx bxs-chevrons-right'></i></span>
                <a href="{{ route('login') }}">login</a>
            </div>
        </div>
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="POST" action=" {{ route('login') }}">
                    @csrf
                    <h2>Login to DogeShop</h2>
                    <input class="@error('email') is-invalid @enderror" id="email" name="email" type="email"
                        placeholder="Email" value="{{ old('email') }}" required />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input class="@error('password') is-invalid @enderror" id="password" name="password" type="password"
                        placeholder="Password" required />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit">login</button>
                    <p class="message">
                        Not registered? <a href="{{ route('register') }} ">Create an account</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
