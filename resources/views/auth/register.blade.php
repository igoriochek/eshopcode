@extends('layouts.app')

@section('title', __('menu.register'))

@section('content')
<div class="my-account pb-6rem">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title">{{ __('auth.login') }}</h3>
                <form class="log-in-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label">{{ __('auth.name') }}<span class="required">*</span></label>
                        <div class="col-md-6">
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
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
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label">{{ __('auth.passwordEnter') }}<span class="required">*</span></label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-3 col-form-label">{{ __('auth.confirmPasswordEnter') }}<span class="required">*</span></label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row pb-3 text-center my-3">
                        <div class="col-md-6 offset-md-3">
                            <div class="login-form-links">
                                <div class="sign-btn">
                                    <button type="submit" class="btn btn-dark3">{{ __('buttons.register') }}</button>
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