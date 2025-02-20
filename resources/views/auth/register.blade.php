@extends('layouts.app')

@section('title', __('menu.register'))

@section('content')
<div class="customer_login">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>{{ __('auth.register') }}</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <p>
                                <label for="name">{{ __('auth.name') }}<span>*</span></label>
                                <input id="name" type="text"
                                    class="@error('name') is-invalid @enderror" name="name" placeholder="{{ __('auth.enterYourName') }}"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
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
                            <div class="login_submit d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class="d-flex align-items-center me-2" style="text-align: start;">{{ __('auth.loginParagraph') }}</span>
                                    <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                                </div>
                                <button type="submit">{{ __('buttons.register') }}</button>
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
    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .login_submit a {
            margin-bottom: 0px !important;
            display: flex !important;
            align-items: center;
        }
    }

    @media only screen and (max-width: 767px) {
        .login_submit a {
            margin-bottom: 0px !important;
            display: flex !important;
            align-items: center;
        }
    }
</style>