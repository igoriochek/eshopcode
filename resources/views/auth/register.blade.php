@extends('layouts.app')

@section('content')
    <div class="page-content pt-20 pb-150">
        <div class="container">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="col-lg-6 col-md-8 m-auto">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h1 class="mb-5">{{__('auth.register')}}</h1>
                                <p class="mb-30">{{__('auth.haveAccount')}} <a href="{{ route('login') }}">{{__('auth.loginHere')}}</a></p>
                            </div>
                            <form method="post" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        required
                                        name="name"
                                        id="name"
                                        placeholder="{{ __('auth.name') }}"
                                        value="{{ old('name') }}"
                                        autocomplete="name"
                                        autofocus
                                    />

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        type="email"
                                        required
                                        name="email"
                                        placeholder="{{ __('auth.email') }}"
                                        value="{{ old('email') }}"
                                        autocomplete="email"
                                    />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input
                                        class="form-control @error('password') is-invalid @enderror"
                                        id="password"
                                        required
                                        type="password"
                                        name="password"
                                        placeholder="{{__('auth.passwordEnter')}}"
                                        autocomplete="new-password"
                                    />

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input
                                        id="password-confirm"
                                        required
                                        type="password"
                                        name="password_confirmation"
                                        placeholder="{{__('auth.passwordEnterConfirm')}}"
                                        autocomplete="new-password"
                                    />
                                </div>
                                <div class="form-group mb-30">
                                    <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold"
                                            name="login"> {{ __('buttons.register') }}
                                    </button>
                                </div>
                            </form>
                            <div class="card-login mt-40 p-0 ml-0">
                                <a href="{{ route('facebook.login') }}" class="social-login facebook-login">
                                    <img src="{{asset('/images/theme/icons/logo-facebook.svg')}}" alt=""/>
                                    <span>{{__('auth.continueFacebook')}}</span>
                                </a>
                                <a href="{{ route('google.login') }}" class="social-login google-login">
                                    <img src="{{asset('/images/theme/icons/logo-google.svg')}}" alt=""/>
                                    <span>{{__('auth.continueGoogle')}}</span>
                                </a>
                                <a href="{{ route('twitter.login') }}" class="social-login apple-login">
                                    <img src="{{asset('/images/theme/icons/icon-twitter-white.svg')}}" alt=""/>
                                    <span>{{__('auth.continueTwitter')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
