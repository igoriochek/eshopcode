@extends('layouts.app')

@section('content')
<div class="my-account pb-6rem">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title">{{ __('auth.verifyEmail') }}</h3>
                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('auth.freshVerifyLink') }}
                </div>
                @endif

                {{ __('auth.checkEmailForVerify') }}
                {{ __('auth.emailNotReceived') }},
                <form class="log-in-form" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <div class="form-group row pb-3 text-center my-3">
                        <div class="col-md-6 offset-md-3">
                            <div class="login-form-links">
                                <div class="sign-btn">
                                    <button type="submit" class="btn btn-dark3">{{ __('auth.resendEmail') }}</button>
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