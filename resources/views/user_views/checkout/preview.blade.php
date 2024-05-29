@extends('layouts.app')

@section('title', __('names.preview'))
@section('parentTitle', __('names.checkout'))
@section('parentUrl', url('/user/checkout'))

@section('content')
    <section class="tp-checkout-area pb-120 pt-40" data-bg-color="#FFFFFF">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                    <!-- checkout place order -->
                    <div class="tp-checkout-place white-bg" style="border: 1px solid #E0E2E3;">
                        <h3 class="tp-checkout-place-title">{{ __('names.yourOrder') }}</h3>

                        <div class="tp-order-info-list">
                            <ul>

                                <!-- header -->
                                <li class="tp-order-info-list-header">
                                    <h4>{{ __('names.product') }}</h4>
                                    <h4>{{ __('names.total') }}</h4>
                                </li>

                                @foreach ($cartItems as $item)
                                    <!-- item list -->
                                    <li class="tp-order-info-list-desc">
                                        <p>{{ $item['product']->name }}
                                            <span> {{ 'x ' . $item->count }}</span>
                                        </p>
                                        <span>€{{ number_format($item->price_current * $item->count, 2) }}</span>
                                    </li>
                                @endforeach

                                @if ($discounts)
                                    @foreach ($discounts as $item)
                                        <!-- subtotal -->
                                        <li class="tp-order-info-list-subtotal">
                                            <span>{{ __('names.discountCoupon') . ' (' . $item->code . ')' }}</span>
                                            <span>-€{{ number_format($item->value, 2) }}</span>
                                        </li>
                                    @endforeach
                                @endif

                                <!-- total -->
                                <li class="tp-order-info-list-total">
                                    <span>{{ __('names.total') }}</span>
                                    <span>€{{ number_format($amount, 2) }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="tp-checkout-payment">
                            <div class="tp-checkout-payment-item paypal-payment">
                                <input type="radio" id="payment_method1" name="payment_method" value="cash-on-delivery"
                                    checked disabled>
                                <label for="paypal" for="payment_method1">
                                    {{ __('Paysera') }}
                                </label>
                            </div>
                        </div>
                        <div class="tp-checkout-btn-wrapper d-flex justify-content-center align-items-center">
                            <button type="submit" class="tp-checkout-btn col-xl-3 col-lg-4 col-md-6 col-12">
                                {{ __('buttons.placeOrder') }}
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
