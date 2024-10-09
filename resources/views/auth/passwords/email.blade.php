@extends('layouts.app')

@section('title', __('auth.resetPassword'))

@section('content')
<section class="sign-up-in-section bg-dark ptb-60" style="background: url('assets/img/page-header-bg.svg')no-repeat right bottom">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-8 col-12">
                <div class="register-wrap p-5 bg-light-subtle shadow rounded-custom">
                    <h1 class="h3" style="color: #262626 !important; display: flex; justify-content: center;">{{ __('auth.resetPassword') }}</h1>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mt-4 register-form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="email" class="mb-1">{{ __('auth.email') }} <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required aria-label="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: #737373">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-3 d-block w-100">{{ __('auth.sendResetPasswordLink') }}</button>
                                </div>
                            </div>
                            <p class="font-monospace fw-medium text-center text-muted mt-3 pt-4 mb-0">
                                @if (Route::has('login'))
                                {{ __('auth.resetPasswordParagraph') }} <a href="{{ route('login') }}" class="text-decoration-none">{{ __('buttons.login') }}</a>
                                @endif
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection