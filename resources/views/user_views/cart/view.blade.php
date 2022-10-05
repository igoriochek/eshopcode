@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("viewcart") ,'title' => __('names.cart')])

    <div class="container cart">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
                    <li class="text-transform-none me-3">
                        <span class="active" style="font-family: 'Playfair Display' ,Serif">{{ __('names.cart') }}</span>
                    </li>
                    <li class="text-transform-none text-color-grey-lighten me-3">
                        <i class="fa-solid fa-angle-right me-2"></i>
                        <span style="font-family: 'Playfair Display' ,Serif">{{ __('names.checkout') }}</span>
                    </li>
                    <li class="text-transform-none text-color-grey-lighten me-3">
                        <i class="fa-solid fa-angle-right me-2"></i>
                        <span style="font-family: 'Playfair Display' ,Serif">{{ __('names.preview') }}</span>
                    </li>
                    <li class="text-transform-none text-color-grey-lighten">
                        <i class="fa-solid fa-angle-right me-2"></i>
                        <span style="font-family: 'Playfair Display' ,Serif">{{ __('names.orderComplete') }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row pb-4 mb-5">
            <div class="col-lg-8 mb-5 mb-lg-0">
                @include('user_views.cart.table')
            </div>
            <div class="col-lg-4 overflow-visible">
                <div class="pin-wrapper">
                    <div class="card border-width-3 border-radius-0 border-color-hover-dark">
                        <div class="card-body">
                            <h6 class="fw-bold text-uppercase mb-3">{{ __('names.overview') }}</h6>
                            <table class="shop_table cart-totals mb-4">
                                <tbody>
                                <tr class="total">
                                    <td>
                                        <strong class="text-dark">{{ __('names.total') }}</strong>
                                    </td>
                                    <td class="text-end">
                                        <strong class="text-dark">
                                            <span class="amount text-dark">{{ $cart->sum ? number_format($cart->sum,2) : '0'}} €</span>
                                        </strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            @if (count($cartItems) > 0)
                                <a href="{{ url('user/checkout') }}" class="btn proceed-to-checkout-button w-100">
                                    {{ __('buttons.proceedToCheckout') }}
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
