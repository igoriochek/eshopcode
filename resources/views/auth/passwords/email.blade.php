@extends('layouts.app')

@section('title', __('auth.resetPassword'))

@section('content')
<section class="section-login padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="section-detail">
                        <h2 class="bb-title">{{ __('auth.resetPassword') }}</h2>
                        @if (session('status'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="bb-login-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="bb-login-wrap">
                            <label for="email">{{ __('auth.email') }}*</label>
                            <input id="email" type="email"
                                class="@error('email') is-invalid @enderror" name="email" placeholder="{{ __('auth.enterYourEmail') }}"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="bb-login-button">
                            <button class="bb-btn-2" type="submit">{{ __('auth.sendResetPasswordLink') }}</button>
                            <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection