@extends('layouts.app')

@section('content')
<section class="section-login padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="section-detail">
                        <h2 class="bb-title">{{ __('auth.passwordConfirmToContinue') }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="bb-login-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="bb-login-wrap">
                            <label for="password">{{ __('auth.passwordEnter') }}*</label>
                            <input id="password" type="password"
                                class="@error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth.enterYourPassword') }}"
                                required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="bb-login-wrap">
                            <a href="{{ route('password.request') }}">{{ __('buttons.forgotPassword') }}</a>
                        </div>
                        <div class="bb-register-button">
                            <button class="bb-btn-2" type="submit">{{ __('auth.passwordEnterConfirm') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    .bb-register-button {
        display: flex;
        justify-content: center;
    }
</style>