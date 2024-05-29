@extends('layouts.app')

@section('title', __('names.preview'))
@section('parentTitle', __('names.checkout'))
@section('parentUrl', url('/user/checkout'))

@section('content')
    <div class="checkout-area section-space-y-axis-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-12">
                    <div class="your-order">
                        <h3>{{ __('names.yourOrder') }}</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name text-start ps-2">
                                            {{ __('names.product') }}
                                        </th>
                                        <th class="cart-product-total text-start ps-2">
                                            {{ __('names.price') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                {{ $item['product']->name }}
                                                <strong class="product-quantity">{{ 'x ' . $item->count }}</strong>
                                            </td>
                                            <td class="cart-product-total">
                                                <span class="amount">
                                                    €{{ number_format($item->price_current * $item->count, 2) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($discounts)
                                        @foreach ($discounts as $item)
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    {{ __('names.discountCoupon') . ' (' . $item->code . ')' }}
                                                    <strong class="product-quantity">{{ 'x ' . $item->count }}</strong>
                                                </td>
                                                <td class="cart-product-total">
                                                    <span class="amount">
                                                        -€{{ number_format($item->value, 2) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <th>{{ __('names.total') }}</th>
                                        <td>
                                            <strong>
                                                <span class="amount">€{{ number_format($amount, 2) }}</span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        {!! Form::open(['route' => ['pay'], 'method' => 'post', 'class' => 'payment-method mt-0']) !!}
                        <div class="payment-accordion">
                            <div id="accordion">
                                <div class="card">
                                    <div class="widgets-area bg-transparent px-0">
                                        <h5 class="mb-5">{{ __('names.paymentMethods') }}</h5>
                                        <div class="widgets-item">
                                            <ul class="widgets-checkbox">
                                                <li>
                                                    <input class="input-checkbox" type="checkbox" id="payment_method1"
                                                        name="payment_method" value="cash-on-delivery" checked disabled>
                                                    <label class="label-checkbox mb-0" for="payment_method1">
                                                        {{ __('Paysera') }}
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-button-payment">
                                <input value="{{ __('buttons.placeOrder') }}" type="submit">
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
