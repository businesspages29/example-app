@extends('layouts.auth')
@section('content')
<form class="form-signin" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
  <div class="text-center mb-4">
    <a href="{{ url('/') }}">
    <img class="mb-4" src="https://www.rajtechnologies.com/ui/images/raj-technologies-logo-top-panel.jpg" alt="" width="72" height="72">
    </a>
    <h1 class="h3 mb-3 font-weight-normal">{{ __('Verify Your Email Address') }}</h1>
        <p>
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif
        </p>
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('click here to request another') }}</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; {{date("Y")}}</p>
</form>         
@endsection