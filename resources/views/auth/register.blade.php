@extends('layouts.app')

@section('title', __('menu.register'))

@section('content')
    <section class="login-register-area section-space-y-axis-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 pt-10 pt-lg-0">
                    <div class="login-form">
                        <h4 class="login-title">{{ __('menu.register') }}</h4>
                        @if (Route::has('login'))
                            <p>
                                {{ __('auth.loginParagraph') }}
                                <span>
                                    <a href="{{ route('login') }}">{{ __('auth.login') }}</a>
                                </span>
                            </p>
                        @endif
                        <form method="POST" action="{{ route('register') }}" class="tp-login-option">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label>{{ __('auth.name') }}*</label>
                                    <input id="name" type="text" class="@error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback mb-4" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label>{{ __('auth.email') }}*</label>
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback mb-4" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label>{{ __('auth.passwordEnter') }}*</label>
                                    <input id="tp_password" type="password" class="@error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback mb-4" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label>{{ __('auth.confirmPasswordEnter') }}*</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="col-lg-12 pt-5" style="justify-content: center; display: flex;">
                                    <button type="submit" class="btn btn-custom-size lg-size btn-primary w-100">
                                        {{ __('buttons.register') }}
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
