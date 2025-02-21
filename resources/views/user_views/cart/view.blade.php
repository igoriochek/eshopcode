@extends('layouts.app')

@section('title', __('menu.cart'))

@section('content')
<div class="shopping_cart_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table_desc">
                    <div class="cart_page table-responsive">
                        @include('user_views.cart.table')
                    </div>
                    <div class="cart_submit">
                        <a href="{{ route('userproducts') }}" class="continue-shopping-button">
                            {{ __('buttons.continueShopping') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="coupon_area">
            <div class="row d-flex justify-content-end">
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right">
                        <h3>{{ __('names.overview') }}</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>{{ __('names.total') }}</p>
                                <p class="cart_amount">€{{ $cart->sum ? number_format($cart->sum, 2) : '0.00' }}</p>
                            </div>
                            @if (count($cartItems) > 0)
                            <div class="checkout_btn">
                                <a href="{{ url('user/checkout') }}">{{ __('buttons.proceedToCheckout') }}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .continue-shopping-button {
        background: #222222;
        border: 0;
        color: #ffffff;
        display: inline-block;
        font-size: 12px;
        font-weight: 500;
        height: 38px;
        line-height: 18px;
        padding: 10px 15px;
        text-transform: uppercase;
        transition: 0.3s;
        border-radius: 3px;
        margin: 0;
        font-family: inherit;
    }

    .continue-shopping-button:hover {
        background: #79a206;
        color: #ffffff;
    }
</style>