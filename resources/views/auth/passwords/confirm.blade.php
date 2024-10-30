@extends('layouts.app')

@section('content')
<div class="my-account pb-6rem">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title">{{ __('auth.passwordEnterConfirm') }}</h3>
                {{ __('auth.passwordConfirmToContinue') }}
                <form class="log-in-form" method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="password" class="col-md-3 col-form-label">{{ __('auth.passwordEnter') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row pb-3 text-center my-3">
                        <div class="col-md-6 offset-md-3">
                            <div class="login-form-links">
                                <a href="{{ route('password.request') }}" class="for-get">{{ __('buttons.forgotPassword') }}</a>
                                <div class="sign-btn">
                                    <button type="submit" class="btn btn-dark3">{{ __('auth.passwordEnterConfirm') }}</button>
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