@extends('layouts.app')

@section('title', __('menu.register'))

@section('content')
    <div class="login-area ptb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="axil-signin-form-wrap mt-0 d-flex justify-content-center align-items-center"
                                style="height: calc(100vh - 180px * 1.5);">
                                <div class="axil-signin-form">
                                    <h3 class="title">{{ __('auth.register') }}</h3>
                                    @if (Route::has('login'))
                                        <p class="b2 mb--55">
                                            {{ __('auth.loginParagraph') }}
                                            <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                                        </p>
                                    @endif
                                    <form class="singin-form" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>{{ __('auth.name') }}*</label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
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
                                        <div class="form-group">
                                            <label>{{ __('auth.confirmPasswordEnter') }}*</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">
                                                {{ __('buttons.register') }}
                                            </button>
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
