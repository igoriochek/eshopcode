@extends('layouts.app')

@section('title', __('menu.login'))

@section('content')
    <div class="login-area ptb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="axil-signin-form-wrap mt-0 d-flex justify-content-center align-items-center"
                                style="height: calc(100vh - 180px * 1.5);">
                                <div class="axil-signin-form d-flex flex-column justify-content-center">
                                    <h3 class="title">{{ __('auth.login') }}</h3>
                                    @if (Route::has('register'))
                                        <p class="b2 mb--55">
                                            {{ __('auth.registerParagraph') }}
                                            <a href="{{ route('register') }}">{{ __('buttons.register') }}</a>
                                        </p>
                                    @endif
                                    <form class="singin-form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>{{ __('auth.email') }}*</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('auth.passwordEnter') }}*</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-check d-flex align-items-center mb-4 pb-3">
                                            <input type="checkbox" class="form-check-input" id="rememberme">
                                            <label class="form-label custom-control-label cur-pointer text-2"
                                                for="rememberme" style="transform: translateX(-25px);">
                                                {{ __('auth.rememberMe') }}
                                            </label>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">
                                                {{ __('buttons.login') }}
                                            </button>
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="forgot-btn">
                                                    {{ __('buttons.forgotPassword') }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-center w-100 pb-5">
                                            <span class="px-4">
                                                - {{ __('auth.or') }} -
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center gap-4">
                                            <a href="{{ route('facebook.login') }}"
                                                class="axil-btn facebook-btn text-center" data-loading-text="Loading...">
                                                <i class="fab fa-facebook-f fa-fw me-2 text-white"></i>
                                                {{ __('auth.loginWith') . ' Facebook' }}
                                            </a>
                                            <a href="{{ route('google.login') }}" class="axil-btn google-btn text-center"
                                                data-loading-text="Loading...">
                                                <i class="fab fa-google fa-fw me-2 text-white"></i>
                                                {{ __('auth.loginWith') . ' Google' }}
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
    </style>
@endpush
