@extends('layouts.app')

@section('title', __('auth.resetPassword'))

@section('content')
<div class="customer_login">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>{{ __('auth.resetPassword') }}</h2>
                        @if (session('status'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <p>
                                <label for="email">{{ __('auth.email') }}<span>*</span></label>
                                <input id="email" type="email"
                                    class="@error('email') is-invalid @enderror" name="email" placeholder="{{ __('auth.enterYourEmail') }}"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                            <div class="login_submit">
                                <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                                <button type="submit">{{ __('auth.sendResetPasswordLink') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .account_form button {
        height: auto !important;
    }
</style>