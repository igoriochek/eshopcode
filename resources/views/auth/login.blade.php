@extends('layouts.app')

@section('title', __('menu.login'))

@section('content')
<div class="customer_login">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>{{ __('auth.login') }}</h2>
                        <form method="POST" action="{{ route('login') }}">
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
                            <div class="login_submit">
                                <a href="{{ route('password.request') }}">{{ __('buttons.forgotPassword') }}</a>
                                <label for="rememberme">
                                    <input type="checkbox" id="rememberme">
                                    {{ __('auth.rememberMe') }}
                                </label>
                                <button type="submit">{{ __('buttons.login') }}</button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <span class="px-4">
                                    - {{ __('auth.or') }} -
                                </span>
                            </div>

                            <div class="d-flex flex-column justify-content-center">
                                <a href="{{ route('facebook.login') }}"
                                    class="facebook-btn text-center" data-loading-text="Loading...">
                                    <i class="fab fa-facebook-f fa-fw me-2"></i>
                                    {{ __('auth.loginWith') . ' Facebook' }}
                                </a>
                                <a href="{{ route('google.login') }}" class="google-btn text-center"
                                    data-loading-text="Loading...">
                                    <i class="fab fa-google fa-fw me-2"></i>
                                    {{ __('auth.loginWith') . ' Google' }}
                                </a>
                            </div>

                            <div class="d-flex justify-content-center align-items-center">
                                <span class="me-2">{{ __('auth.registerParagraph') }}</span>
                                <a class="auth-button" href="{{ route('register') }}">{{ __('buttons.register') }}</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .facebook-btn {
        background: #4267B2;
        border: 0;
        color: #ffffff;
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        height: 34px;
        line-height: 26px;
        padding: 5px 20px;
        text-transform: uppercase;
        transition: 0.3s;
        border-radius: 20px;
        margin-bottom: 1.5rem;
    }

    .google-btn {
        background-color: #DB4437;
        border: 0;
        color: #ffffff;
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        height: 34px;
        line-height: 26px;
        padding: 5px 20px;
        text-transform: uppercase;
        transition: 0.3s;
        border-radius: 20px;
        margin-bottom: 1.5rem;
    }

    .facebook-btn,
    .google-btn {
        &:hover {
            background: #222222;
            color: #ffffff;
        }
    }

    .soc-media-login {
        padding-right: 280px;
        padding-left: 280px;
    }

    @media (max-width: 788px) {
        .soc-media-login {
            padding-right: 0px;
            padding-left: 0px;
        }
    }
</style>
@endpush