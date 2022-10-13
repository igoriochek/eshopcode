@extends('layouts.app')

@section('content')
    <div class="modal-dialog modal-dialog-centered modal-login">
        <div class="modal-wrapper">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('auth.login') }}</h5>
                    <p class="modal-description">{{ __('auth.registerParagraph') }}
                        <a class="login-link" href="{{ route('register') }}">
                            {{ __('buttons.register') }}
                        </a>
                    </p>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="modal-form">
                            <label class="form-label">{{ __('auth.email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="modal-form">
                            <label class="form-label">{{ __('auth.passwordEnter') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="modal-form d-flex justify-content-between flex-wrap gap-2">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">{{ __('auth.rememberMe') }}</label>
                            </div>
                            <div class="text-end">
                                @if (Route::has('password.request'))
                                <a class="modal-form__link" href="{{ route('password.request') }}">{{ __('buttons.forgotPassword') }}</a>
                                @endif
                            </div>
                        </div>
                        <div class="modal-form">
                            <button type="submit" class="btn btn-primary btn-hover-secondary w-100">{{ __('buttons.login') }}</button>
                        </div>
                    </form>
                    <div class="modal-social-option">
                        <p>{{ __('auth.or') }}</p>

                        <ul class="modal-social-btn">
                            <li><a href="{{ route('facebook.login') }}" class="btn facebook text-center "><i class="fab fa-facebook"></i> Facebook</a></li>
                            <li class="pt-3"><a href="{{ route('google.login') }}" class="btn google text-center"><i class="fab fa-google"></i> Google</a></li>
                            <li class="pt-3"><a href="{{ route('twitter.login') }}" class="btn twitter text-center"><i class="fab fa-twitter"></i> Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
