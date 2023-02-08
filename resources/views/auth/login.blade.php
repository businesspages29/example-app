@extends('layouts.auth')
@section('content')
<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf

    <div class="text-center mb-4">
        <a href="{{ url('/') }}">
        <img class="mb-4" src="https://www.rajtechnologies.com/ui/images/raj-technologies-logo-top-panel.jpg" alt="" width="72" height="72">
        </a>
        <h1 class="h3 mb-3 font-weight-normal">{{ __('Login') }}</h1>
    </div>

    <div class="form-label-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="inputEmail">{{ __('E-Mail Address') }}</label>
    </div>

    <div class="form-label-group">
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="">{{ __('Password') }}</label>
    </div>

    <div class="form-check  mb-3">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
    </div>
    <button type="submit" class="btn btn-lg btn-primary btn-block">
        {{ __('Login') }}
    </button>
    @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
    @endif
    <p class="mt-5 mb-3 text-muted text-center">&copy; {{date("Y")}}</p>
</form>
@endsection