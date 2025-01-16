@extends('layouts.app')

@section('title', __('menu.login'))

@section('content')
<section class="section-login padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="section-detail">
                        <h2 class="bb-title">{{ __('auth.login') }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="bb-login-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="bb-login-wrap">
                            <label for="email">{{ __('auth.email') }}*</label>
                            <input id="email" type="email"
                                class="@error('email') is-invalid @enderror" name="email" placeholder="{{ __('auth.enterYourEmail') }}"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="bb-login-wrap">
                            <label for="password">{{ __('auth.passwordEnter') }}*</label>
                            <input id="password" type="password"
                                class="@error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth.enterYourPassword') }}"
                                required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="bb-login-wrap">
                            <div class="bb-sidebar-block-item">
                                <input type="checkbox" id="rememberme">
                                <label for="rememberme" style="transform: translateX(-25px); margin-left: 50px;">
                                    {{ __('auth.rememberMe') }}
                                </label>
                                <span class="checked"></span>
                            </div>
                        </div>
                        <div class="bb-login-wrap">
                            <a href="{{ route('password.request') }}">{{ __('buttons.forgotPassword') }}</a>
                        </div>
                        <div class="bb-login-button">
                            <button class="bb-btn-2" type="submit">{{ __('buttons.login') }}</button>
                            <a href="{{ route('register') }}">{{ __('buttons.register') }}</a>
                        </div>
                        <div class="bb-login-wrap" style="display: flex;justify-content: center;margin-top: 24px;">
                            <span class="px-4">
                                - {{ __('auth.or') }} -
                            </span>
                        </div>
                        <div class="bb-login-wrap">
                            <div class="d-flex flex-column justify-content-center gap-4">
                                <a href="{{ route('facebook.login') }}"
                                    class="facebook-btn text-center" data-loading-text="Loading..."
                                    style="padding: 8px;">
                                    <i class="fab fa-facebook-f fa-fw me-2"></i>
                                    {{ __('auth.loginWith') . ' Facebook' }}
                                </a>
                                <a href="{{ route('google.login') }}" class="google-btn text-center"
                                    data-loading-text="Loading..." style="padding: 8px;">
                                    <i class="fab fa-google fa-fw me-2"></i>
                                    {{ __('auth.loginWith') . ' Google' }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css')
<style>
    .bb-sidebar-block-item .checked {
        top: 4px;
    }


    .facebook-btn {
        background-color: #4267B2;
        border: 1px solid #4267B2;
        color: #f1f1f1 !important;
        border-radius: 10px;
    }

    .google-btn {
        background-color: #DB4437;
        border: 1px solid #DB4437;
        color: #f1f1f1 !important;
        border-radius: 10px;
    }

    .facebook-btn,
    .google-btn {
        transition: all 0.3s ease-in-out;

        &:hover,
        &:focus {
            color: #3d4750 !important;
            background: transparent;
            border-color: #3d4750;
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