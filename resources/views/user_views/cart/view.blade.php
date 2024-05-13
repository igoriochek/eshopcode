@extends('layouts.app')

@section('title', __('menu.cart'))

@section('content')
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="axil-product-cart-wrap">
                <div class="product-table-heading">
                    <h4 class="title">{{ __('menu.cart') }}</h4>
                </div>
                <div class="table-responsive">
                    @include('user_views.cart.table')
                </div>
                <div class="cart-update-btn-area">
                    <div class="update-btn d-flex">
                        <a href="{{ route('userproducts') }}" class="axil-btn btn-outline">
                            {{ __('buttons.continueShopping') }}
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                        <div class="axil-order-summery mt--80">
                            <h5 class="title mb--20">{{ __('names.overview') }}</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table mb--30">
                                    <tbody>
                                        <tr class="order-total">
                                            <td>{{ __('names.total') }}</td>
                                            <td class="order-total-amount">
                                                €{{ $cart->sum ? number_format($cart->sum, 2) : '0.00' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if (count($cartItems) > 0)
                                <a href="{{ url('user/checkout') }}" class="axil-btn btn-bg-primary checkout-btn">
                                    {{ __('buttons.proceedToCheckout') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
