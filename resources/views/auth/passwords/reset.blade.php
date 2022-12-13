@extends('layouts.app')

@section('content')
    <div class="page-content pt-40 pb-100">
        <div class="container">
            <div class="row">
                @include('flash::message')
                <div class="col-xl-4 col-lg-6 col-md-12 m-auto">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h2 class="mb-60 mt-15">{{ __('auth.resetPassword') }}</h2>
                            </div>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('auth.email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="new-password" placeholder="{{ __('auth.passwordEnter') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                           required autocomplete="new-password" placeholder="{{ __('auth.passwordEnterConfirm') }}">
                                </div>
                                <div class="form-group mt-50">
                                    <button type="submit" class="btn btn-heading w-100 hover-up">
                                        {{ __('auth.resetPassword') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
