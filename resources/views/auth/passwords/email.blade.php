@extends('layouts.app')

@section('content')
    <section id="hero" class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                    <div id="login">
                        <div class="text-center">
                            <h1>{{ __('auth.resetPassword') }}</h1>
                        </div>
                        <hr>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
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
                            <div id="pass-info" class="clearfix"></div>
                            <button type="submit" class="btn_full mt-4">
                                {{ __('auth.sendResetPasswordLink') }}
                            </button>
                            <a href="{{ route('login') }}" class="btn_full_outline">{{ __('buttons.back') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
