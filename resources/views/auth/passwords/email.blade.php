@extends('layouts.app')

@section('title', __('auth.resetPassword'))

@section('content')
{{-- 
<div class="login-register-area section-space-y-axis-100">
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="login-form">
                <h4 class="login-title">{{ __('auth.resetPassword') }}</h4>
                    @if (Route::has('login'))
                    <p>
                        {{ __('auth.resetPasswordParagraph') }}
                        <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                    </p>
                    @endif


                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label>{{ __('auth.email') }}*</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-12 pt-5" style="justify-content: center; display: flex;">
                                <button type="submit" class="btn btn-custom-size lg-size btn-primary w-100">{{ __('auth.sendResetPasswordLink') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<section class="login-register-area section-space-y-axis-100">
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-4">
                @include('flash_messages')
            </div>
            <div class="col-lg-6">
                <div class="login-form">
                <h4 class="login-title">{{ __('auth.resetPassword') }}</h4>
                @if (Route::has('login'))
                            <p>
                                {{ __('auth.resetPasswordParagraph') }}
                                <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                            </p>
                        @endif


                    <form method="POST" action="{{ route('password.email') }}" class="tp-login-option">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="email">{{ __('auth.email') }}*</label>
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-12 pt-5" style="justify-content: center; display: flex;">
                                <button type="submit" class="btn btn-custom-size lg-size btn-primary w-100">{{ __('auth.sendResetPasswordLink') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection