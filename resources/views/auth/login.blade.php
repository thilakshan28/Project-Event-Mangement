@extends('layouts.auth.master')
@section('title', 'Login')

@section('content')
<header class="masthead text-center text-white">
    <div class="masthead-content">
            <div class="col-lg-4 mx-auto">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class= "form-group d-flex justify-content-center">
                <h2 class="masthead-subheading mb-0"> Welcome to Event Store!</h2>
                </div>
                    <label class="label">E-Mail Address</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    <label class="label">Password</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button class="btn btn-dark">Login</button>

                <div class="d-flex justify-content-between">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Password?</a>
                    @endif
                </div>
            </form>
</div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
    <p class="footer-text text-center">Copyright © 2021 Event Sore. All rights reserved.</p>
</header>
@endsection
