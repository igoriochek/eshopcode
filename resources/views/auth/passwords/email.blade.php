@extends('layouts.app')

@section('title', __('auth.resetPassword'))

@section('content')
    {{-- <div class="login-area ptb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="login-content">
                                <h3>{{ __('auth.resetPassword') }}</h3>
                                @if (Route::has('login'))
                                    <p>
                                        {{ __('auth.resetPasswordParagraph') }}
                                        <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                                    </p>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{ __('auth.email') }}*</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="default-btn style5 w-100" data-loading-text="Loading...">
                                        {{ __('auth.sendResetPasswordLink') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <section class="tp-login-area pb-140 p-relative z-index-1 fix">
        <div class="tp-login-shape">
            <img class="tp-login-shape-1" src="{{ asset('template/img/login/login-shape-1.png') }}" alt="">
            <img class="tp-login-shape-2" src="{{ asset('template/img/login/login-shape-2.png') }}" alt="">
            <img class="tp-login-shape-3" src="{{ asset('template/img/login/login-shape-3.png') }}" alt="">
            <img class="tp-login-shape-4" src="{{ asset('template/img/login/login-shape-4.png') }}" alt="">
        </div>
        <div class="container">
           <div class="row justify-content-center">
              <div class="col-12 mt-4">
                @include('flash_messages')
              </div>
              <div class="col-xl-6 col-lg-8">
                 <div class="tp-login-wrapper">
                    <div class="tp-login-top text-center mb-30">
                       <h3 class="tp-login-title">{{ __('auth.resetPassword') }}</h3>
                        @if (Route::has('login'))
                            <p>
                                {{ __('auth.resetPasswordParagraph') }}
                                <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                            </p>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('password.email') }}" class="tp-login-option">
                        @csrf
                       <div class="tp-login-input-wrapper">
                          <div class="tp-login-input-box">
                             <div class="tp-login-input">
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                             <div class="tp-login-input-title">
                                <label for="email">{{ __('auth.email') }}*</label>
                             </div>
                          </div>
                       </div>
                       <div class="tp-login-bottom mb-15">
                          <button type="submit" class="tp-login-btn w-100 mt-10">
                            {{ __('auth.sendResetPasswordLink') }}
                          </button>
                       </div>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection
