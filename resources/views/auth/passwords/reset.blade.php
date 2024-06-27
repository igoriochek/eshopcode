@extends('layouts.app')

@section('title', __('auth.resetPassword'))

@section('content')
    <div class="login-area ptb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="axil-signin-form-wrap mt-0 d-flex justify-content-center align-items-center"
                                style="height: calc(100vh - 180px * 2.5);">
                                <div class="axil-signin-form">
                                    <h3 class="title mb--40">{{ __('auth.resetPassword') }}</h3>
                                    <form class="singin-form" method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group">
                                            <label>{{ __('auth.email') }}*</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>
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
                                                required autocomplete="new-password">
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
                                                {{ __('auth.resetPassword') }}
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
