@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="box">
            <div class="breadcumb">
                <a href="{{ route('home.index') }}">home</a>
                <span><i class='bx bxs-chevrons-right'></i></span>
                <a href="{{ route('register') }}">register</a>
            </div>
        </div>
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="POST" action=" {{ route('register') }}">
                    @csrf
                    <h2>Create An Account</h2>
                    <input class="@error('name') is-invalid @enderror" id="name" name="name" type="text"
                        value="{{ old('name') }}" placeholder="Your name" autofocus required />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input class="@error('email') is-invalid @enderror" id="email" name="email" type="email"
                        placeholder="Your email" value="{{ old('email') }}" required />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input class="@error('password') is-invalid @enderror" id="password" name="password" type="password"
                        placeholder="Your password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password-confirm" name="password_confirmation" type="password"
                        placeholder="Confirm your password" required>
                    <button type="submit">register</button>
                    <p class="message">
                        Already registered? <a href="{{ route('login') }}">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
