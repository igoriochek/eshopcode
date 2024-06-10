@extends('layouts.app')

@section('title', __('auth.resetPassword'))

@section('content')
<section class="login-register-area section-space-y-axis-100">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <div class="login-form">
               <h4 class="login-title">{{ __('auth.resetPassword') }}</h4>
               <form method="POST" action="{{ route('password.update') }}" class="tp-login-option">
                  @csrf
                  <input type="hidden" name="token" value="{{ $token }}">
                  <div class="row">
                     <div class="col-lg-12">
                        <label>{{ __('auth.email') }}*</label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="col-lg-12">
                        <label for="password">{{ __('auth.passwordEnter') }}*</label>
                        <input id="password" type="text" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="col-lg-12">
                        <label for="password-confirm">{{ __('auth.confirmPasswordEnter') }}*</label>
                        <input id="password-confirm" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password">

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
                        <button type="submit" class="btn btn-custom-size lg-size btn-primary w-100">{{ __('auth.resetPassword') }}</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>


@endsection