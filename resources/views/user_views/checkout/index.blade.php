@extends('layouts.app')

@section('title', __('names.checkout'))

@section('content')
    <section class="tp-checkout-area pb-120 pt-40" data-bg-color="#FFFFFF">
        <div class="container">
           <div class="row">
              @if (!$discounts->isEmpty())
                <div class="col-12" style="padding-left: 200px; padding-right: 200px;">
                    <div class="register-wrap p-4 bg-white shadow rounded-custom position-relative aos-init aos-animate mb-5">
                        <div class="tp-checkout-verify-item">
                            <p class="tp-checkout-verify-reveal">
                                {{ __('names.selectDiscountCoupon') }}
                            </p>
                        <details>
                            <summary style="cursor: pointer; color: #007bff; text-decoration: underline;">
                                {{ __('buttons.applyCoupon') }}
                            </summary>
                            <div id="tpCheckoutCouponForm" class="tp-return-customer"
                                style="border: 1px solid #E0E2E3; padding: 10px;">
                                {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                                    <div class="tp-return-customer-input mb-0">
                                        <div class="tp-shop-top-right d-sm-flex align-items-center gap-3">
                                            <div class="tp-shop-top-select">
                                                <select name="discount[]" class="form-control">
                                                    <option value="" class="text-muted">{{ __('---') }}</option>
                                                    @foreach($discounts as $item)
                                                        <option value="{{ $item->id }}">{{ $item->code }} -€{{ number_format($item->value, 2) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="tp-return-customer-btn tp-checkout-btn" style="height: 40px; margin-left: 30px;">
                                                {{ __('buttons.applyCoupon') }}
                                            </button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </details>
                    </div>
                </div>
            </div>
        @endif
              <div class="col-12">
                {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                 <!-- checkout place order -->
                 <div class="register-wrap p-4 bg-white shadow rounded-custom">
                        <h3 class="tp-checkout-place-title text-center mb-4">{{ __('names.yourOrder') }}</h3>

                    <div class="tp-order-info-list">
                            <!-- Order Summary Table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-0">{{ __('names.product') }}</th>
                                            <th class="text-end border-0">{{ __('names.total') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                          <!-- Products -->
                                        @foreach($cartItems as $item)
                                            <tr>
                                                <td class="border-0">
                                                    <div class="d-flex align-items-center">
                                                        <span>{{ $item['product']->name }}</span>
                                                        <span class="text-muted ms-2">× {{ $item->count }}</span>
                                                    </div>
                                                </td>
                                                <td class="text-end border-0">
                                                    €{{ number_format(($item->price_current * $item->count), 2) }}
                                                </td>
                                            </tr>
                                        @endforeach

                          <!-- Total -->
                                        <tr>
                                            <td colspan="2" class="p-0">
                                                <div class="d-flex justify-content-between border-top mt-3 pt-3">
                                                    <span class="fw-bold fs-5">{{ __('names.total') }}</span>
                                                    <span class="fw-bold fs-5">€{{ number_format($cart->sum, 2) }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    <!-- Payment Method -->
                            <div class="tp-checkout-payment mt-4">
                                <div class="tp-checkout-payment-item paypal-payment">
                                    <input type="radio" id="payment_method1" name="payment_method" value="cash-on-delivery" checked disabled>
                                    <label for="payment_method1">
                                        {{ __('Paysera') }}
                                    </label>
                                </div>
                            </div>
                    <!-- Submit Button -->
                            <div class="tp-checkout-btn-wrapper mt-4">
                                <div class="row justify-content-center">
                                    <div class="col-xl-6 col-lg-8 col-md-10">
                                       <button type="submit" class="btn btn-primary w-100">
                                                {{ __('buttons.preview') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </div>
                 </div>
                {!! Form::close() !!}
              </div>
           </div>
        </div>
     </section>
@endsection

