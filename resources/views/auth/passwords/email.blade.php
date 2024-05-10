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
                                style="height: calc(100vh - 180px * 3.5);">
                                <div class="axil-signin-form">
                                    <h3 class="title">{{ __('auth.resetPassword') }}</h3>
                                    @if (Route::has('login'))
                                        <p class="b2 mb--55">
                                            {{ __('auth.resetPasswordParagraph') }}
                                            <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                                        </p>
                                    @endif
                                    <form class="singin-form" method="POST" action="{{ route('password.email') }}">
                                        @csrf
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
                                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">
                                                {{ __('auth.sendResetPasswordLink') }}
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
