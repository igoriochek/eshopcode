@extends('layouts.app')

@section('title', __('names.preview'))
@section('parentTitle', __('names.checkout'))
@section('parentUrl', url('/user/checkout'))

@section('content')
<div class="whish-list-section pb-6rem">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                <div class="axil-order-summery order-checkout-summery">
                    <h3 class="title text-capitalize d-flex justify-content-center">{{ __('names.yourOrder') }}</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">{{ __('names.product') }}</th>
                                    <th scope="col" class="text-center">{{ __('names.subtotal') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr class="order-product">
                                    <td class="text-start">{{ $item['product']->name }} {{ 'x' . $item->count }}</td>
                                    <td class="text-center">€{{ number_format($item->price_current * $item->count, 2) }}</td>
                                </tr>
                                @endforeach
                                @foreach ($discounts as $discount)
                                <tr class="order-product">
                                    <td class="text-start">{{ __('names.discountCouponCode') }}: {{ $discount->code }}</td>
                                    <td class="text-center">€ -{{ number_format($discount->value, 2) }}</td>
                                </tr>
                                @endforeach
                                <tr class="order-total">
                                    <td class="text-start">{{ __('names.total') }}</td>
                                    <td class="order-total-amount text-center">€{{ number_format($amount, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="order-payment-method">
                        <h5 class="title mb-2 mt-4" style="justify-content: center;display: flex;">{{ __('names.paymentMethods') }}</h5>
                        <div class="single-payment">
                            <div class="input-group justify-content-center align-items-center" style="margin-top: 10px; margin-bottom: 20px;">
                                <input type="radio" id="payment_method1" name="payment_method"
                                    value="cash-on-delivery" checked disabled>
                                <img src="{{ asset('images/1_Paysera logo for light background.svg') }}" alt="Paypal"
                                    width="100px" style="margin-left: 10px;">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-block rounded" style="width: fit-content">
                            {{ __('buttons.placeOrder') }}
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection