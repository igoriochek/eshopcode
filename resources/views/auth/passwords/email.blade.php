@extends('layouts.app')

@section('title', __('auth.resetPassword'))

@section('content')
    <div class="login-area ptb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="login-content">
                                <h3>{{ __('auth.resetPassword') }}</h3>
                                @if (Route::has('login'))
                                    <p>
                                        {{ __('auth.resetPasswordParagraph') }}
                                        <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                                    </p>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{ __('auth.email') }}*</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="default-btn style5 w-100" data-loading-text="Loading...">
                                        {{ __('auth.sendResetPasswordLink') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
