@extends('layouts.app')

@section('title', __('auth.resetPassword'))

@section('content')
    <section class="login-register-area section-space-y-axis-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-form">
                        <h4 class="login-title">{{ __('auth.resetPassword') }}</h4>
                        <form method="POST" action="{{ route('password.update') }}" class="tp-login-option">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>{{ __('auth.email') }}*</label>
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror"
                                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                        readonly>
                                    @error('email')
                                        <span class="invalid-feedback mb-4" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <label for="password">{{ __('auth.passwordEnter') }}*</label>
                                    <input id="password" type="text" class="@error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback mb-4" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <label for="password-confirm">{{ __('auth.confirmPasswordEnter') }}*</label>
                                    <input id="password-confirm" type="text" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">

                                </div>
                                <div class="col-lg-12 pt-5" style="justify-content: center; display: flex;">
                                    <button type="submit"
                                        class="btn btn-custom-size lg-size btn-primary w-100">{{ __('auth.resetPassword') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
