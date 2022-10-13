@extends('layouts.app')

@section('content')
    <div class="modal-dialog modal-dialog-centered modal-login">
        <div class="modal-wrapper">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('auth.resetPassword') }}</h5>
                    <p class="modal-description">{{ __('auth.resetPasswordParagraph') }}
                        <a class="login-link" href="{{ route('login') }}">
                            {{ __('buttons.login') }}
                        </a>
                    </p>
                </div>
                <div class="modal-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
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
                            <button type="submit" class="btn btn-primary btn-hover-secondary w-100">{{ __('auth.sendResetPasswordLink') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
