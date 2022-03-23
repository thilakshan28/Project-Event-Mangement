
@extends('layouts.auth.master')
@section('title', 'Sign Up')

@section('content')
<header class="masthead text-center text-white">
    <div class="masthead-content">
            <div class="col-lg-4 mx-auto">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class= "form-group d-flex justify-content-center">
                <h2 class="masthead-subheading mb-0"> Join with Us!</h2>
                </div>
                    <label class="label">Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus >
                    <label class="label">Phone Number</label>
                    <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autofocus >
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
                <label class="label">Confirm Password</label>
                    <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button class="btn btn-dark">Register</button>

                <div class="d-flex justify-content-between">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">
                        Already registered?
                    </a>
                </li>
            </ul>
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
