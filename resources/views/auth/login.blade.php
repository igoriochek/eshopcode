@extends('layouts.app')

@section('title', __('menu.login'))

@section('content')
<section class="sign-up-in-section bg-dark ptb-60" style="background: url('assets/img/page-header-bg.svg')no-repeat right bottom">
   <div class="container">
      <div class="row align-items-center justify-content-center">
         <div class="col-lg-5 col-md-8 col-12">
            <div class="register-wrap p-5 bg-light-subtle shadow rounded-custom">
               <h1 class="h3" style="color: #262626 !important; display: flex; justify-content: center;">{{ __('auth.login') }}</h1>
               <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="action-btns">
                     <a href="{{ route('google.login') }}" class="btn google-btn bg-white shadow-sm mt-4 d-block d-flex align-items-center text-decoration-none justify-content-center">
                        <img src="{{ asset('template/img/icons/google.svg') }}" alt="google" class="me-3">
                        <span>{{ __('auth.loginWith').' Google' }}</span>
                     </a>
                  </div>
                  <div class="action-btns">
                     <a href="{{ route('google.login') }}" class="btn google-btn bg-white shadow-sm mt-4 d-block d-flex align-items-center text-decoration-none justify-content-center">
                        <img src="{{ asset('template/img/icons/facebook.svg') }}" alt="facebook" class="me-3">
                        <span>{{ __('auth.loginWith').' Facebook' }}</span>
                     </a>
                  </div>
                  <div class="position-relative d-flex align-items-center justify-content-center mt-4 py-4">
                     <span class="divider-bar"></span>
                     <h6 class="position-absolute text-center divider-text bg-light-subtle mb-0" style="color: #262626 !important;">{{ __('auth.or') }}</h6>
                  </div>
                  <div class="mt-4 register-form">
                     <div class="row">
                        <div class="col-sm-12">
                           <label for="email" class="mb-1">{{ __('auth.email') }} <span class="text-danger">*</span></label>
                           <div class="input-group mb-3">
                              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required aria-label="email" autofocus>
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong style="color: #737373">{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <label for="password" class="mb-1">{{ __('auth.passwordEnter') }} <span
                                 class="text-danger">*</span></label>
                           <div class="input-group mb-3">
                              <input id="tp_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required aria-label="current-password" autofocus>
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                 <strong style="color: #737373">{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="tp-login-remeber">
                           <input id="rememberme" type="checkbox">
                           <label for="rememberme">{{ __('auth.rememberMe') }}</label>
                        </div>
                        <div class="col-12">
                           <button type="submit" class="btn btn-primary mt-3 d-block w-100">{{ __('buttons.login') }}</button>
                        </div>
                     </div>
                     <p class="font-monospace fw-medium text-center text-muted mt-3 pt-4 mb-0">
                        @if (Route::has('register'))
                        {{ __('auth.registerParagraph') }} <a href="{{ route('register') }}" class="text-decoration-none">{{ __('menu.register') }}</a>
                        @endif
                        <br>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none">{{ __('buttons.forgotPassword') }}</a>
                        @endif
                     </p>
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
        .facebook-btn {
            background-color: #4267B2; 
            border: 1px solid #4267B2;
        }

        .google-btn {
            background-color: #DB4437;
            border: 1px solid #DB4437;
        }

        .facebook-btn, .google-btn {
            transition: all 400ms ease-out;

            &:hover, &:focus {
                background-color: #111111; 
            }
        }
    </style>
@endpush --}}