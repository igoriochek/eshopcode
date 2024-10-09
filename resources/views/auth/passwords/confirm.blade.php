@extends('layouts.app')

@section('content')
<section class="sign-up-in-section bg-dark ptb-60" style="background: url('assets/img/page-header-bg.svg')no-repeat right bottom">
   <div class="container">
      <div class="row align-items-center justify-content-center">
         <div class="col-lg-5 col-md-8 col-12">
            <div class="register-wrap p-5 bg-light-subtle shadow rounded-custom">
               <h1 class="h3" style="color: #262626 !important; display: flex; justify-content: center;">{{ __('auth.passwordEnterConfirm') }}</h1>
               <form method="POST" action="{{ route('password.confirm') }}">
                  @csrf
                  <div class="mt-4 register-form">
                     <div class="row">
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
                        <div class="col-12">
                           <button type="submit" class="btn btn-primary mt-3 d-block w-100">{{ __('auth.passwordEnterConfirm') }}</button>
                        </div>
                        <p class="font-monospace fw-medium text-center text-muted mt-3 pt-4 mb-0">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none">{{ __('buttons.forgotPassword') }}</a>
                        @endif
                     </p>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection