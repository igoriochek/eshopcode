@extends('layouts.app')

@section('content')
<section class="section-login padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="section-detail">
                        <h2 class="bb-title">{{ __('auth.verifyEmail') }}</h2>
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.freshVerifyLink') }}
                        </div>
                        @endif
                        {{ __('auth.checkEmailForVerify') }}
                        {{ __('auth.emailNotReceived') }},
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="bb-login-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="bb-login-button">
                            <button type="submit" class="bb-btn-2">{{ __('auth.resendEmail') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    .bb-login-button {
        display: flex;
        justify-content: center;
    }
</style>