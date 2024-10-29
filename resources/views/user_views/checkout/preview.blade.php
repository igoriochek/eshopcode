@extends('layouts.app')

@section('title', __('names.preview'))
@section('parentTitle', __('names.checkout'))
@section('parentUrl', url('/user/checkout'))

@section('content')
    <section class="tp-checkout-area pb-120 pt-40" data-bg-color="#FFFFFF">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
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

                                        <!-- Discounts -->
                                        @if ($discounts)
                                            @foreach ($discounts as $item)
                                                <tr>
                                                    <td class="border-0">
                                                        <div class="d-flex align-items-center">
                                                            <span>{{ __('names.discountCoupon') . ' (' . $item->code . ')' }}</span>
                                                            <span class="text-muted ms-2">× {{ $item->count }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-end border-0 text-danger">
                                                        -€{{ number_format($item->value, 2) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        <!-- Total -->
                                        <tr>
                                            <td colspan="2" class="p-0">
                                                <div class="d-flex justify-content-between border-top mt-3 pt-3">
                                                    <span class="fw-bold fs-5">{{ __('names.total') }}</span>
                                                    <span class="fw-bold fs-5">€{{ number_format($amount, 2) }}</span>
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
                                            {{ __('buttons.placeOrder') }}
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