@extends('layouts.app')

@section('content')
    <div class="page-content pt-40 pb-100">
        <div class="container">
            <div class="row">
                @include('flash::message')
                <div class="col-xl-4 col-lg-6 col-md-12 m-auto">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h2 class="mb-15 mt-15">{{ __('auth.resetPassword') }}</h2>
                                <p class="mb-30">{{ __('auth.rememberedPassword') }}
                                    <a class="ml-5" href="{{ route('login') }}">{{ __('auth.loginHere') }}</a>
                                </p>
                            </div>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror"
                                           type="email"
                                           required
                                           name="email"
                                           id="email"
                                           placeholder="{{__('auth.email')}}"
                                           value="{{ old('email') }}"
                                           autocomplete="email"
                                           autofocus/>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-50">
                                    <button type="submit" class="btn btn-heading w-100 hover-up"
                                            name="login">{{ __('auth.sendResetPasswordLink') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
