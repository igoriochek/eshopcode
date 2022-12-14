@extends('layouts.app')

@section('content')
    <div class="auth-form container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 mb-5 mb-lg-0">
                <form method="POST" action="{{ route('password.update') }}" class="auth-form-container">
                    <h4 class="form-title">{{ __('auth.resetPassword') }}</h4>
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">
                                {{ __('auth.email') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">
                                {{ __('auth.passwordEnter') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">
                                {{ __('auth.confirmPasswordEnter') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3 auth-button mb-3 mt-5" data-loading-text="Loading...">
                                {{ __('auth.resetPassword') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
