@extends('layouts.app')

@section('title', __('auth.resetPassword'))

@section('content')
<div class="my-account pb-6rem">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title">{{ __('auth.resetPassword') }}</h3>
                <form class="log-in-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label">{{ __('auth.email') }}<span class="required">*</span></label>
                        <div class="col-md-6">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row pb-3 text-center my-3">
                        <div class="col-md-6 offset-md-3">
                            <div class="login-form-links">
                            <a href="{{ route('login') }}" class="for-get">{{ __('auth.resetPasswordParagraph') . ' ' . __('buttons.login') }}</a>
                                <div class="sign-btn">
                                    <button type="submit" class="btn btn-dark3">{{ __('auth.sendResetPasswordLink') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection