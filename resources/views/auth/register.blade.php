@extends('layouts.app')

@section('content')

    @include('header', ['url' => route("userproducts") ,'title' =>  __('auth.register')])
    <div class="auth-form container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-dark">
                                {{ __('auth.name') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-dark" style="margin-top: 20px">
                                {{ __('auth.email') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                            <label class="form-label text-dark" style="margin-top: 20px">
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
                            <label class="form-label text-dark" style="margin-top: 20px">
                                {{ __('auth.passwordEnterConfirm') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit" class="btn w-100 text-light py-3 auth-button mb-3 mt-5" data-loading-text="Loading...">
                                {{ __('buttons.register') }}
                            </button>
                            @if (Route::has('login'))
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="me-2">{{ __('auth.loginParagraph') }}</span>
                                    <a class="login-link" href="{{ route('login') }}">
                                        {{ __('buttons.login') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
