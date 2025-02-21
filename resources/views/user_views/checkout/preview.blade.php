@extends('layouts.app')

@section('title', __('names.preview'))
@section('parentTitle', __('names.checkout'))
@section('parentUrl', url('/user/checkout'))

@section('content')
<div class="Checkout_section">
    <div class="container">
        <div class="checkout_form">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <h3>{{ __('names.yourOrder') }}</h3>
                    <div class="order_table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>{{ __('names.product') }}</th>
                                    <th>{{ __('names.total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td>{{ $item['product']->name }}<strong>{{ ' × ' . $item->count }}</strong></td>
                                    <td>€{{ number_format(($item->price_current * $item->count),2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('names.subtotal') }}</th>
                                    <td>€{{ number_format($cart->sum, 2) }}</td>
                                </tr>
                                @foreach ($discounts as $discount)
                                <tr>
                                    <th>{{ __('names.couponDiscount') }}</th>
                                    <td>€ -{{ number_format($discount->value, 2) }}</td>
                                </tr>
                                @endforeach
                                <tr class="order_total">
                                    <th>{{ __('names.total') }}</th>
                                    <td><strong>€{{ number_format($amount, 2) }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="panel-default d-flex justify-content-center">
                            <p class="paypal">PayPal
                                <img src="{{ asset('images/1_Paysera logo for light background.svg') }}" style="width: 100px !important;" alt="payment">
                            </p>
                        </div>
                        {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                        <div class="order_button d-flex justify-content-center">
                            <button type="submit">{{ __('buttons.placeOrder') }}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .payment_method {
        display: flex;
        flex-direction: column;
    }

    .paypal {
        font-weight: 500;
        margin-bottom: 10px !important;
    }
</style>