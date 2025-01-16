@extends('layouts.app')

@section('title', __('menu.register'))

@section('content')
<section class="section-login padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="section-detail">
                        <h2 class="bb-title">{{ __('auth.register') }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="bb-login-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="bb-login-wrap">
                            <label for="name">{{ __('auth.name') }}*</label>
                            <input id="name" type="text"
                                class="@error('name') is-invalid @enderror" name="name" placeholder="{{ __('auth.enterYourName') }}"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
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
                            <label for="password-confirm">{{ __('auth.confirmPasswordEnter') }}*</label>
                            <input id="password-confirm" type="password"
                                 name="password_confirmation" placeholder="{{ __('auth.enterYourPasswordAgain') }}"
                                required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="bb-login-button">
                            <button class="bb-btn-2" type="submit">{{ __('buttons.register') }}</button>
                            <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection