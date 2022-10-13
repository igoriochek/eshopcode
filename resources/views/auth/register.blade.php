@extends('layouts.app')

@section('content')
    <div class="modal-dialog modal-dialog-centered modal-login">
        <div class="modal-wrapper">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('auth.register') }}</h5>
                    <p class="modal-description">{{ __('auth.loginParagraph') }}
                        <a class="login-link" href="{{ route('login') }}">
                            {{ __('buttons.login') }}
                        </a>
                    </p>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <div class="modal-form">
                            <label class="form-label">{{ __('auth.name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="modal-form">
                            <label class="form-label">{{ __('auth.email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="modal-form">
                            <label class="form-label">{{ __('auth.passwordEnter') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="modal-form">
                            <label class="form-label">{{ __('auth.passwordEnterConfirm') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="modal-form">
                            <button type="submit" class="btn btn-primary btn-hover-secondary w-100">{{ __('buttons.register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
