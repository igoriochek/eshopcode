@extends('layouts.app')

@section('content')
    @include('header', ['title' => __('auth.login')])
    <div class="auth-form container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-dark">
                                {{ __('auth.email') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control text-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-dark" style="margin-top: 20px">
                                {{ __('auth.passwordEnter') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control text-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-center my-3">
                        <div class="form-group col-md-auto">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                <label class="form-label custom-control-label cur-pointer text-2" for="rememberme" style="margin-top: 10px">
                                    {{ __('auth.rememberMe') }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            @if (Route::has('password.request'))
                                <a class="login-link" href="{{ route('password.request') }}">
                                    {{ __('buttons.forgotPassword') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit" class="btn w-100 py-3 text-light auth-button" data-loading-text="Loading...">
                                {{ __('buttons.login') }}
                            </button>
                            <div class="divider">
                            <span class="px-4">
                                {{ __('auth.or') }}
                            </span>
                            </div>
                            <a href="{{ route('facebook.login') }}" class="btn w-100 align-items-center d-inline-flex justify-content-center py-3 auth-button mb-4" data-loading-text="Loading..." style="margin-top: 20px">
                                <i class="fab fa-facebook-f fa-fw me-2"></i>
                                {{ __('auth.loginWith').' Facebook' }}
                            </a>
                            <a href="{{ route('google.login') }}" class="btn w-100 align-items-center d-inline-flex justify-content-center py-3 auth-button mb-4" data-loading-text="Loading...">
                                <i class="fab fa-google fa-fw me-2"></i>
                                {{ __('auth.loginWith').' Google' }}
                            </a>
                            <a href="{{ route('twitter.login') }}" class="btn w-100 align-items-center d-inline-flex justify-content-center py-3 auth-button mb-4" data-loading-text="Loading...">
                                <i class="fab fa-twitter fa-fw me-2"></i>
                                {{ __('auth.loginWith').' Twitter' }}
                            </a>
                            @if (Route::has('register'))
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="me-2">{{ __('auth.registerParagraph') }}</span>
                                    <a class="login-link" href="{{ route('register') }}">
                                        {{ __('buttons.register') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
