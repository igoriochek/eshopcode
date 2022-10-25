@extends('layouts.app')

@section('content')
    <section id = "hero" class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                    <div id="login">
                        <div class="text-center">
                        <h1>VIATORA</h1>
                        </div>
                        <hr>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <a href="{{ route('facebook.login') }}" class="social_bt facebook">{{ __('auth.loginFb') }}</a>
                            <a href="{{ route('google.login') }}" class="social_bt google">{{ __('auth.loginGoogle') }}</a>
                            <a href="{{ route('twitter.login') }}" class="social_bt twitter">{{ __('auth.loginTwitter') }}</a>
                            <div class="divider"><span>0r</span></div>
                            <div class="form-group">
                                <label for="email" >{{ __('auth.email') }}</label >
                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" >{{ __('auth.passwordEnter') }}</label>

                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <p class="small">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('buttons.forgotPassword') }}
                                    </a>
                                @endif
                            </p>
                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('auth.rememberMe') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn_full">
                                {{ __('buttons.login') }}
                            </button>
                            <a href="{{ route('register') }}" class="btn_full_outline">{{ __('buttons.register') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
