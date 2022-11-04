@extends('layouts.app')

@section('content')

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ __('menu.login') }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ __('menu.login') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <div class="login__section section--padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 mb-5 mb-lg-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login__section--inner">
                            <div class="account__login">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title mb-10">{{ __('auth.login') }}</h2>
                                </div>
                                <div class="account__login--inner">
                                    <label>
                                        <input id="email" type="email"
                                               class="account__login--input @error('email') is-invalid @enderror"
                                               placeholder="{{ __('auth.email') }}"
                                               name="email" value="{{ old('email') }}" required autocomplete="email"
                                               autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </label>
                                    <label>
                                        <input id="password" type="password"
                                               class="account__login--input @error('password') is-invalid @enderror"
                                               placeholder="{{ __('auth.passwordEnter') }}"
                                               name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </label>
                                    <div
                                        class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="rememberme" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label"
                                                   for="rememberme">
                                                {{ __('auth.rememberMe') }}</label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="account__login--forgot" href="{{ route('password.request') }}">
                                                {{ __('buttons.forgotPassword') }}
                                            </a>
                                        @endif
                                    </div>
                                    <button class="account__login--btn primary__btn"
                                            type="submit">{{ __('buttons.login') }}</button>
                                    <div class="account__login--divide">
                                        <span
                                            class="account__login--divide__text">{{ __('auth.or').' '.__('auth.loginWith')}}</span>
                                    </div>
                                    <div class="account__social d-flex justify-content-center mb-15">
                                        <a class="account__social--link facebook" href="{{ route('facebook.login') }}">Facebook</a>
                                        <a class="account__social--link google" href="{{ route('google.login') }}">Google</a>
                                        <a class="account__social--link twitter" href="{{ route('twitter.login') }}">Twitter</a>
                                    </div>
                                    @if (Route::has('register'))
                                        <p class="account__login--signup__text">{{ __('auth.registerParagraph') }} <a
                                                class="account__login--forgot"
                                                href="{{ route('register') }}">{{ __('buttons.register') }}</a></p>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
