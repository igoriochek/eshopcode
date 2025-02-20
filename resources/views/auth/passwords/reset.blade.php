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
                        <form method="POST" action="{{ route('password.update') }}">
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
                            <p>
                                <label for="password">{{ __('auth.passwordEnter') }}<span>*</span></label>
                                <input id="password" type="password"
                                    class="@error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth.enterYourPassword') }}"
                                    required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                            <p>
                                <label for="password-confirm">{{ __('auth.confirmPasswordEnter') }}<span>*</span></label>
                                <input id="password-confirm" type="password"
                                    name="password_confirmation" placeholder="{{ __('auth.enterYourPasswordAgain') }}"
                                    required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                            <div class="login_submit">
                                <button type="submit">{{ __('auth.resetPassword') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection