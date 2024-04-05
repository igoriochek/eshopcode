@extends('layouts.app')

@section('title', __('menu.login'))

@section('content')
    <div class="login-area ptb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="login-content">
                                <h3>{{ __('auth.login') }}</h3>
                                @if (Route::has('register'))
                                    <p>
                                        {{ __('auth.registerParagraph') }}
                                        <a href="{{ route('register') }}">{{ __('buttons.register') }}</a>
                                    </p>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{ __('auth.email') }}*</label>
                                        <input id="email" type="email" class="form-control form-control-lg text-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('auth.passwordEnter') }}*</label>
                                        <input id="password" type="password" class="form-control form-control-lg text-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <ul class="d-flex justify-content-between">
                                            <li>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="rememberme">
                                                    <label class="form-label custom-control-label cur-pointer text-2" for="rememberme">
                                                        {{ __('auth.rememberMe') }}
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">
                                                        {{ __('buttons.forgotPassword') }}
                                                    </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <button type="submit" class="default-btn style5 w-100" data-loading-text="Loading...">
                                        {{ __('buttons.login') }}
                                    </button>
                                    <div class="d-flex justify-content-center w-100 py-4">
                                        <span class="px-4">
                                            - {{ __('auth.or') }} -
                                        </span>
                                    </div>
                                    <a href="{{ route('facebook.login') }}" class="default-btn style5 w-100 mb-2 facebook-btn" data-loading-text="Loading...">
                                        <i class="fab fa-facebook-f fa-fw me-2"></i>
                                        {{ __('auth.loginWith').' Facebook' }}
                                    </a>
                                    <a href="{{ route('google.login') }}" class="default-btn style5 w-100 google-btn" data-loading-text="Loading...">
                                        <i class="fab fa-google fa-fw me-2"></i>
                                        {{ __('auth.loginWith').' Google' }}
                                    </a>
                                </form>
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
        }

        .google-btn {
            background-color: #DB4437;
            border: 1px solid #DB4437;
        }

        .facebook-btn, .google-btn {
            transition: all 400ms ease-out;

            &:hover, &:focus {
                background-color: #111111; 
            }
        }
    </style>
@endpush