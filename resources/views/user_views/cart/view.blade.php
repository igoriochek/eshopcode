@extends('layouts.app')

@section('title', __('menu.cart'))

@section('content')
    <div class="cart-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <div class="table-content table-responsive">
                            @include('user_views.cart.table')
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon1">
                                        <a href="{{ route('userproducts') }}" class="btn btn-dark rounded-0 py-2">
                                            {{ __('buttons.continueShopping') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>{{ __('names.overview') }}</h2>
                                    <ul>
                                        <li>
                                            {{ __('names.total') }}
                                            <span>€{{ $cart->sum ? number_format($cart->sum, 2) : '0' }}</span>
                                        </li>
                                    </ul>
                                    @if (count($cartItems) > 0)
                                        <a href="{{ url('user/checkout') }}">
                                            {{ __('buttons.proceedToCheckout') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
