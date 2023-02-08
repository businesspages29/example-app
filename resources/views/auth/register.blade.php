@extends('layouts.auth')
@section('content')
    <form class="form-signin" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="text-center mb-4">
            <a href="{{ url('/') }}">
                <img class="mb-4" src="https://www.rajtechnologies.com/ui/images/raj-technologies-logo-top-panel.jpg"
                    alt="" width="72" height="72">
            </a>
            <h1 class="h3 mb-3 font-weight-normal">{{ __('Register') }}</h1>
        </div>

        <div class="form-label-group">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('Name') }}" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="inputEmail">{{ __('Name') }}</label>
        </div>

        <div class="form-label-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="inputEmail">{{ __('E-Mail Address') }}</label>
        </div>
        <div class="form-label-group">
            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                value="{{ old('phone') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="inputPhone">{{ __('Phone') }}</label>
        </div>

        <div class="form-label-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="inputEmail">{{ __('Password') }}</label>
        </div>

        <div class="form-label-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
            <label for="inputEmail">{{ __('Confirm Password') }}</label>
        </div>

        <button type="submit" class="btn btn-lg btn-primary btn-block">
            {{ __('Register') }}
        </button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; {{ date('Y') }}</p>
    </form>
@endsection
