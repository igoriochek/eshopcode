@extends('layouts.app')

@section('content')
<div class="customer_login">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>{{ __('auth.passwordConfirmToContinue') }}</h2>
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf
                            <p>
                                <label for="password">{{ __('auth.passwordEnter') }}<span>*</span></label>
                                <input id="password" type="password"
                                    class="@error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth.enterYourPassword') }}"
                                    required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                            <div class="login_submit">
                                <a href="{{ route('password.request') }}">{{ __('buttons.forgotPassword') }}</a>
                                <button type="submit">{{ __('auth.passwordEnterConfirm') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .account_form button {
        height: auto !important;
    }
</style>