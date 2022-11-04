@extends('layouts.app')

@section('content')

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ __('menu.register') }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ __('menu.register') }}</span>
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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="login__section--inner">
                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title mb-10">{{ __('auth.register') }}</h2>
                                </div>
                                <div class="account__login--inner">
                                    <label>
                                        <input id="name" type="text" class="account__login--input @error('name') is-invalid @enderror"
                                               placeholder="{{ __('auth.name') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </label>
                                    <label>
                                        <input id="email" type="email" class="account__login--input @error('email') is-invalid @enderror"
                                               placeholder="{{ __('auth.email') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </label>
                                    <label>
                                        <input id="password" type="password" class="account__login--input @error('password') is-invalid @enderror"
                                               placeholder=" {{ __('auth.passwordEnter') }}" name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </label>
                                    <label>
                                        <input id="password-confirm" type="password" class="account__login--input" placeholder="{{ __('auth.confirmPasswordEnter') }}"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </label>
                                    <button class="account__login--btn primary__btn mb-10" type="submit">{{ __('buttons.register') }}</button>
                                    @if (Route::has('login'))
                                        <p class="account__login--signup__text">{{ __('auth.loginParagraph') }}
                                            <a class="account__login--forgot"
                                               href="{{ route('login') }}">{{ __('buttons.login') }}
                                            </a>
                                        </p>
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
