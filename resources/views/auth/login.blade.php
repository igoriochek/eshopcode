@extends('layouts.app')

@section('title', __('menu.login'))

@section('content')
<section class="login-register-area section-space-y-axis-100">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <div class="login-form">
               <h4 class="login-title">{{ __('auth.login') }}</h4>
               @if (Route::has('register'))
               <p>
                  {{ __('auth.registerParagraph') }}
                  <span>
                     <a href="{{ route('register') }}">{{ __('menu.register') }}</a>
                  </span>
               </p>
               @endif
               <form method="POST" action="{{ route('login') }}" class="tp-login-option">
                  @csrf
                  <div class="row">
                     <div class="col-lg-12">
                        <label>{{ __('auth.email') }}*</label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="col-lg-12">
                        <label>{{ __('auth.passwordEnter') }}*</label>
                        <input id="tp_password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>

                     <div class="col-md-8">
                        <div class="check-box">
                           <input id="rememberme" type="checkbox">
                           <label for="rememberme">{{ __('auth.rememberMe') }}</label>
                        </div>
                     </div>

                     @if (Route::has('password.request'))
                     <div class="col-md-4 pt-1 mt-md-0">
                        <div class="forgotton-password_info">
                           <a href="{{ route('password.request') }}">
                              {{ __('buttons.forgotPassword') }}
                           </a>
                        </div>
                     </div>
                     @endif

                     <div class="col-lg-12 pt-5" style="justify-content: center; display: flex;">
                        <button type="submit" class="btn btn-custom-size lg-size btn-primary w-100">{{ __('buttons.login') }}</button>
                     </div>
                     <div class="col-lg-12 justify-content-center pt-4" style="width: 100%; display: flex;">
                        <p>{{ __('auth.or') }}</p>
                     </div>

                        <div class="col-lg-12 pt-1" style="justify-content: center; display: flex;">
                           <a href="{{ route('google.login') }}" class="btn btn-custom-size btn-primary lg-size google-btn w-100" style="background-color: #DB4437; border: 1px solid #DB4437">
                              <i class="fab fa-google fa-fw me-2"></i>
                              <span>{{ __('auth.loginWith').' Google' }}</span>
                           </a>
                        </div>

                        <div class="col-lg-12 pt-4" style="justify-content: center; display: flex;">
                           <a href="{{ route('facebook.login') }}" class="btn btn-custom-size btn-primary lg-size facebook-btn w-100" style="background-color: #4267B2; border: 1px solid #4267B2">
                              <i class="fab fa-facebook-f fa-fw me-2"></i>
                              {{ __('auth.loginWith').' Facebook' }}
                           </a>
                        </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

{{-- @push('css')
    <style>
        .btn .btn-primary .lg-size .facebook-btn {
            background-color: #4267B2 !important; 
            border: 1px solid #4267B2 !important;
        }


        .btn .btn-primary .lg-size .google-btn {
            background-color: #DB4437 !important;
            border: 1px solid #DB4437 !important;
        }

        .facebook-btn, .google-btn {
            transition: all 400ms ease-out;

            &:hover, &:focus {
                background-color: #111111; 
            }
        }
    </style>
@endpush --}}