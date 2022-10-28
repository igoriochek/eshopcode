@extends('layouts.app')

@section('content')
    <section class="cart__section section--padding">
        <div class="container-fluid cart">
            <div class="row pb-5">
                <div class="col">
                    <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
                        <li class="text-transform-none me-3">
                            <span class="active">{{ __('names.cart') }}</span>
                        </li>
                        <li class="text-transform-none text-color-grey-lighten me-3">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            <span>{{ __('names.checkout') }}</span>
                        </li>
                        <li class="text-transform-none text-color-grey-lighten me-3">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            <span>{{ __('names.preview') }}</span>
                        </li>
                        <li class="text-transform-none text-color-grey-lighten">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            <span>{{ __('names.orderComplete') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="cart__section--inner">
                <div class="row pb-4 mb-5">
                    <div class="col-lg-8">
                        @include('user_views.cart.table')
                    </div>
                    <div class="col-lg-4">
                        <div class="cart__summary border-radius-10">
                            <div class="cart__note mb-20">
                                <h3 class="cart__note--title">{{ __('names.overview') }}</h3>
                            </div>
                            <div class="cart__summary--total mb-20">
                                <table class="cart__summary--total__table">
                                    <tbody>
                                    <tr class="cart__summary--total__list">
                                        <td class="cart__summary--total__title text-left">{{ __('names.total') }}</td>
                                        <td class="cart__summary--amount text-right">
                                            €{{ $cart->sum ? number_format($cart->sum,2) : '0'}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart__summary--footer d-flex justify-content-end">
                                @if (count($cartItems) > 0)
                                    <a href="{{ url('user/checkout') }}"
                                       class="cart__summary--footer__btn primary__btn checkout">
                                        {{ __('buttons.proceedToCheckout') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
