@extends('layouts.app')

@section('title', __('auth.resetPassword'))

@section('content')
    <section class="tp-login-area pb-140 p-relative z-index-1 fix">
        <div class="tp-login-shape">
           <img class="tp-login-shape-1" src="{{ asset('template/img/login/login-shape-1.png') }}" alt="">
           <img class="tp-login-shape-2" src="{{ asset('template/img/login/login-shape-2.png') }}" alt="">
           <img class="tp-login-shape-3" src="{{ asset('template/img/login/login-shape-3.png') }}" alt="">
           <img class="tp-login-shape-4" src="{{ asset('template/img/login/login-shape-4.png') }}" alt="">
        </div>
        <div class="container">
           <div class="row justify-content-center">
              <div class="col-xl-6 col-lg-8">
                 <div class="tp-login-wrapper">
                    <div class="tp-login-top text-center mb-30">
                       <h3 class="tp-login-title">{{ __('auth.resetPassword') }}</h3>
                    </div>
                    <form method="POST" action="{{ route('password.update') }}" class="tp-login-option">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                       <div class="tp-login-input-wrapper">
                          <div class="tp-login-input-box">
                             <div class="tp-login-input">
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>
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
                          <div class="tp-login-input-box">
                             <div class="tp-login-input">
                                <input id="password" type="text" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                             <div class="tp-login-input-title">
                                <label for="password">{{ __('auth.passwordEnter') }}*</label>
                             </div>
                          </div>
                          <div class="tp-login-input-box">
                            <div class="tp-login-input">
                               <input id="password-confirm" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="tp-login-input-title">
                               <label for="password-confirm">{{ __('auth.confirmPasswordEnter') }}*</label>
                            </div>
                         </div>
                       </div>
                       <div class="tp-login-bottom">
                          <button type="submit" class="tp-login-btn w-100 mt-10">
                            {{ __('auth.resetPassword') }}
                        </button>
                       </div>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection

