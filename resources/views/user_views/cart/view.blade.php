@extends('layouts.app')

@section('content')
    <div class="container cart">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
                    <li class="text-transform-none me-3">
                        <span class="active">{{ __('Cart') }}</span>
                    </li>
                    <li class="text-transform-none text-color-grey-lighten me-3">
                        <i class="fa-solid fa-angle-right me-2"></i>
                        <span>{{ __('Checkout') }}</span>
                    </li>
                    <li class="text-transform-none text-color-grey-lighten me-3">
                        <i class="fa-solid fa-angle-right me-2"></i>
                        <span>{{ __('Preview') }}</span>
                    </li>
                    <li class="text-transform-none text-color-grey-lighten">
                        <i class="fa-solid fa-angle-right me-2"></i>
                        <span>{{ __('Order Complete') }}</span>
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
                            <h6 class="fw-bold text-uppercase mb-3">{{ __('Overview') }}</h6>
                            <table class="shop_table cart-totals mb-4">
                                <tbody>
                                    <tr class="total">
                                        <td>
                                            <strong class="text-dark">{{ __('Total') }}</strong>
                                        </td>
                                        <td class="text-end">
                                            <strong class="text-dark">
                                                <span class="amount text-dark">€{{ $cart->sum ?? '0'}}</span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ url('user/checkout') }}" class="btn proceed-to-checkout-button w-100">
                                {{ __('Proceed to Checkout') }}
                                <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
