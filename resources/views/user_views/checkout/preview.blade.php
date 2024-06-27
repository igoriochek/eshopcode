@extends('layouts.app')

@section('title', __('names.preview'))
@section('parentTitle', __('names.checkout'))
@section('parentUrl', url('/user/checkout'))

@section('content')
    <div class="axil-checkout-area axil-section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                    <div class="axil-order-summery order-checkout-summery">
                        <h5 class="title mb--20">{{ __('names.yourOrder') }}</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table">
                                <thead>
                                    <tr>
                                        <th>{{ __('names.product') }}</th>
                                        <th>{{ __('names.subtotal') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr class="order-product">
                                            <td>{{ $item['product']->name }} {{ 'x' . $item->count }}</td>
                                            <td>€{{ number_format($item->price_current * $item->count, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    @if ($discounts)
                                        @foreach ($discounts as $item)
                                            <tr class="order-product">
                                                <td>{{ __('names.discountCoupon') . ' (' . $item->code . ')' }}</td>
                                                <td>-€{{ number_format($item->value, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr class="order-total">
                                        <td>{{ __('names.total') }}</td>
                                        <td class="order-total-amount">€{{ number_format($amount, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-payment-method">
                            <h5 class="title mb--20">{{ __('names.paymentMethods') }}</h5>
                            <div class="single-payment">
                                <div class="input-group justify-content-between align-items-center">
                                    <input type="radio" id="payment_method1" name="payment_method"
                                        value="cash-on-delivery" checked disabled>
                                    <label for="payment_method1">{{ __('Paysera') }}</label>
                                    <img src="{{ asset('images/1_Paysera logo for light background.svg') }}" alt="Paypal"
                                        width="100px">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="axil-btn btn-bg-primary checkout-btn" style="width: fit-content">
                            {{ __('buttons.placeOrder') }}
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
