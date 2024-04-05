@extends('layouts.app')

@section('title', __('menu.cart'))

@section('content')
    <div class="cart-area pt-70 pb-45">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table table table-responsive">
                        @include('user_views.cart.table')
                    </div>
                    <ul class="cart-btn-list d-flex justify-content-between">
                        <li>
                            <a href="{{ route('userproducts') }}" class="default-btn style5">
                                {{ __('buttons.continueShopping') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="check-out-summary">
                        <h3>{{ __('names.overview') }}</h3>
                        <ul>
                            <li>{{ __('names.total') }} <span>€{{ $cart->sum ? number_format($cart->sum, 2) : '0'}}</span></li>
                        </ul>
                        @if (count($cartItems) > 0)
                            <a href="{{ url('user/checkout') }}" class="default-btn style5">
                                {{ __('buttons.proceedToCheckout') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
