@extends('layouts.app')

@section('title', __('menu.login'))

@section('content')
<div class="my-account pb-6rem">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title">{{ __('auth.login') }}</h3>
                <form class="log-in-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label">{{ __('auth.email') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-3 col-form-label">{{ __('auth.passwordEnter') }}</label>
                        <div class="col-md-6">
                            <div class="input-group mb-2 mr-sm-2">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-prepend">
                                    <button type="button" class="input-group-text btn-dark3 show-password" onclick="togglePassword()">
                                        {{ __('auth.show') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row pb-3 text-center">
                        <div class="col-md-6 offset-md-3">
                            <input type="checkbox" id="rememberme">
                            <label for="rememberme" style="transform: translateX(-25px); margin-left: 25px;">
                                {{ __('auth.rememberMe') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row pb-3 text-center">
                        <div class="col-md-6 offset-md-3">
                            <div class="login-form-links">
                                <a href="{{ route('password.request') }}" class="for-get"> {{ __('buttons.forgotPassword') }}</a>
                                <div class="sign-btn">
                                    <button type="submit" class="btn btn-dark3">{{ __('buttons.login') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <div class="col-12">
                            <div class="border-top">
                                <a href="{{ route('register') }}" class="no-account">{{ __('auth.registerParagraph') . ' ' . __('buttons.register') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center w-100 py-3">
                        <span class="px-4">
                            - {{ __('auth.or') }} -
                        </span>
                    </div>
                    <div class="soc-media-login">
                        <div class="d-flex flex-column justify-content-center gap-4">
                            <a href="{{ route('facebook.login') }}"
                                class="axil-btn facebook-btn text-center" data-loading-text="Loading..."
                                style="padding: 8px;">
                                <i class="fab fa-facebook-f fa-fw me-2 text-white"></i>
                                {{ __('auth.loginWith') . ' Facebook' }}
                            </a>
                            <a href="{{ route('google.login') }}" class="axil-btn google-btn text-center"
                                data-loading-text="Loading..." style="padding: 8px;">
                                <i class="fab fa-google fa-fw me-2 text-white"></i>
                                {{ __('auth.loginWith') . ' Google' }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .facebook-btn {
        background-color: #4267B2;
        border: 1px solid #4267B2;
        color: #f1f1f1;
    }

    .google-btn {
        background-color: #DB4437;
        border: 1px solid #DB4437;
        color: #f1f1f1;
    }

    .facebook-btn,
    .google-btn {
        transition: all 100ms ease;

        &:hover,
        &:focus {
            color: #f1f1f1;
            transform: scale(1.05, 1.05);
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

<script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const showButton = document.querySelector(".show-password");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            showButton.textContent = "{{ __('auth.hide') }}";
        } else {
            passwordField.type = "password";
            showButton.textContent = "{{ __('auth.show') }}";
        }
    }
</script>