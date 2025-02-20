@extends('layouts.app')

@section('content')
<div class="customer_login">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>{{ __('auth.verifyEmail') }}</h2>
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.freshVerifyLink') }}
                        </div>
                        @endif
                        {{ __('auth.checkEmailForVerify') }}
                        {{ __('auth.emailNotReceived') }},
                        <div class="login_submit">
                            <form method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit">{{ __('auth.resendEmail') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection