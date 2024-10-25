@extends('layouts.app')

@section('title', __('names.preview'))
@section('parentTitle', __('names.checkout'))
@section('parentUrl', url('/user/checkout'))

@section('content')
    <section class="tp-checkout-area pb-120 pt-40" data-bg-color="#FFFFFF">
        <div class="container">
           <div class="row">
              <div class="col-12" style="padding-left: 200px; padding-right: 200px;">
                {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                 <!-- checkout place order -->
                 <div class="register-wrap p-4 bg-white shadow rounded-custom position-relative aos-init aos-animate" style="padding-left: 30px !important;">
                    <h3 class="tp-checkout-place-title" style="display: flex; justify-content: center;">{{ __('names.yourOrder') }}</h3>

                    <div class="tp-order-info-list">
                       <div>

                          <!-- header -->
                          <div class="tp-order-info-list-header">
                             <h4>{{ __('names.product') }}</h4>
                          </div>

                          @foreach($cartItems as $item)
                            <!-- item list -->
                            <div class="tp-order-info-list-desc" style="display: flex;justify-content: space-between;">
                                <p>{{ $item['product']->name }} 
                                    <span> {{ 'x '.$item->count }}</span>
                                </p>
                                <span>€{{ number_format(($item->price_current * $item->count), 2) }}</span>
                            </div>
                          @endforeach

                          @if ($discounts)
                            @foreach($discounts as $item)
                                <!-- subtotal -->
                                <div class="tp-order-info-list-subtotal"  style="display: flex;justify-content: space-between;">
                                    <span>{{ __('names.discountCoupon').' ('.$item->code.')'  }}</span>
                                    <span>-€{{ number_format($item->value, 2) }}</span>
                                </div>
                            @endforeach
                          @endif

                          <!-- total -->
                          <div class="tp-order-info-list-total"  style="display: flex;justify-content: space-between;">
                             <span>{{ __('names.total') }}</span>
                             <span>€{{ number_format($amount, 2) }}</span>
                          </div>
                       </div>
                    </div>
                    <div class="tp-checkout-payment">
                       <div class="tp-checkout-payment-item paypal-payment" style="display: flex;justify-content: center; margin-top: 20px; margin-bottom: 20px;">
                          <input type="radio" id="payment_method1" name="payment_method" value="cash-on-delivery" checked disabled style="margin-right: 5px;">
                          <label for="paypal" for="payment_method1">
                            {{ __('Paysera') }}
                        </label>
                       </div>
                    </div>
                    <div class="tp-checkout-btn-wrapper d-flex justify-content-center align-items-center">
                       <button type="submit" class="btn btn-primary col-xl-3 col-lg-4 col-md-6 col-12">
                            {{ __('buttons.placeOrder')  }}
                       </button>
                    </div>
                 </div>
                {!! Form::close() !!}
              </div>
           </div>
        </div>
     </section>
@endsection
