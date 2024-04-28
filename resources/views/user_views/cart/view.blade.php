@extends('layouts.app')

@section('title', __('menu.cart'))

@section('content')
    <section class="tp-cart-area pb-120">
        <div class="container">
           <div class="row">
              <div class="col-xl-9 col-lg-8">
                 <div class="tp-cart-list mb-25 mr-30">
                    @include('user_views.cart.table')
                 </div>
                 <div class="tp-cart-bottom">
                    <div class="row align-items-end">
                       <div class="col-xl-6 col-md-8">
                          <div class="tp-cart-coupon">
                            <div class="tp-cart-coupon-input-box">
                                <div class="tp-cart-coupon-input d-flex align-items-center">
                                   <button type="submit" style="height: 50px">
                                     <a href="{{ route('userproducts') }}" class="px-4">
                                         {{ __('buttons.continueShopping') }}
                                     </a>
                                   </button>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6">
                 <div class="tp-cart-checkout-wrapper">
                    <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                       <span class="tp-cart-checkout-top-title">{{ __('names.overview') }}</span>
                    </div>
                    <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                       <span>{{ __('names.total') }}</span>
                       <span>€{{ $cart->sum ? number_format($cart->sum, 2) : '0'}}</span>
                    </div>
                    <div class="tp-cart-checkout-proceed">
                        @if (count($cartItems) > 0)
                            <a href="{{ url('user/checkout') }}" class="tp-cart-checkout-btn w-100">
                                {{ __('buttons.proceedToCheckout') }}
                            </a>
                        @endif
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection
