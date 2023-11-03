@extends('layouts.app')

@section('content')
    <div class="page-content pt-40 pb-150">
        <div class="container">
            @if ($message = session()->get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="col-lg-6 col-md-8 m-auto">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h1 class="mb-5">{{ __('auth.login') }}</h1>
                                <p class="mb-30">
                                    {{__('auth.noAccount')}}
                                    <a class="ml-5" href="{{route('register')}}">{{__('auth.createHere')}}</a>
                                </p>
                            </div>
                            <form method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           id="email"
                                           type="text "
                                           placeholder="{{ __('auth.email') }}"
                                           required
                                           value="{{old('email')}}"
                                           autocomplete="email"
                                           autofocus/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control @error('password') is-invalid @enderror"
                                           required
                                           type="password"
                                           name="password"
                                           id="email"
                                           autocomplete="current-password"
                                           placeholder="{{__('auth.passwordEnter')}}"/>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="login_footer form-group mb-50">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" value="{{ old('remember') ? 'checked' : '' }}"/>
                                            <label class="form-check-label"
                                                   for="remember">
                                                <span>{{ __('auth.rememberMe') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <a class="text-muted"
                                       href="{{  route('password.request')  }}">{{__('buttons.forgotPassword')}}</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-heading w-100 hover-up"
                                            name="login">{{ __('buttons.login') }}
                                    </button>
                                </div>
                            </form>
                            <hr class="my-5">
                            <div class="card-login mt-40 p-0 ml-0 border-0">
                                <a href="{{ route('facebook.login') }}" class="social-login facebook-login d-flex justify-content-center fs-6">
                                    <img src="{{asset('/images/theme/icons/logo-facebook.svg')}}" alt=""/>
                                    <span>{{__('auth.continueFacebook')}}</span>
                                </a>
                                <a href="{{ route('google.login') }}" class="social-login google-login d-flex justify-content-center fs-6 text-white">
                                    <i class="fa-brands fa-google me-3 fs-4"></i>
                                    <span>{{__('auth.continueGoogle')}}</span>
                                </a>
                                <a href="{{ route('twitter.login') }}" class="social-login apple-login d-flex justify-content-center fs-6">
                                    <img src="{{asset('/images/theme/icons/icon-twitter-white.svg')}}" alt=""/>
                                    <span>{{__('auth.continueTwitter')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
