@extends('layouts.app')

@section('content')

    <div class="checkout__page--area section--padding">
        <div class="container checkout">
            <div class="row pb-5">
                <div class="col">
                    <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
                        <li class="text-transform-none me-3">
                            <a href="{{ url("/{$role}/viewcart") }}" class="done">{{ __('names.cart') }}</a>
                        </li>
                        <li class="text-transform-none text-color-grey-lighten me-3">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            <a href="{{ url("/{$role}/checkout") }}" class="done">{{ __('names.checkout') }}</a>
                        </li>
                        <li class="text-transform-none text-color-grey-lighten me-3">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            <span class="active">{{ __('names.preview') }}</span>
                        </li>
                        <li class="text-transform-none text-color-grey-lighten">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            <span>{{ __('names.orderComplete') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <aside class="checkout__sidebar sidebar border-radius-10">
                        <h2 class="checkout__order--summary__title text-center mb-15">{{ __('names.yourOrder') }}</h2>
                        <div class="cart__table checkout__product--table">
                            <table class="cart__table--inner">
                                <tbody class="cart__table--body">
                                @foreach($cartItems as $item)
                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="product__image two  d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                    <img class="display-block border-radius-5"
                                                         alt="{{ $item['product']->name }}"
                                                         src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/noimage.jpeg @endif">
                                                    <span class="product__thumbnail--quantity">{{ $item->count }}</span>
                                                </div>
                                                <div class="product__description">
                                                    <h4 class="product__description--name">{{ $item['product']->name }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span
                                                class="cart__price">€{{ number_format(($item->price_current * $item->count),2) }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="checkout__total pb-5" style="border: none">
                            <table class="checkout__total--table">
                                <tbody class="checkout__total--body">
                                <tr class="checkout__total--items">
                                    <td class="checkout__total--title text-left">{{ __('names.subtotal') }}</td>
                                    <td class="checkout__total--amount text-right">€{{ number_format($cart->sum,2) }}</td>
                                </tr>
                                @if ($discounts)
                                <tr class="checkout__total--items">
                                    <td class="checkout__total--title text-left text-danger">{{ __('names.discountCoupon') }}</td>
                                </tr>
                                @foreach($discounts as $item)
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">{{ $item->code }} - {{ $item->value }}% {{ __('names.off') }}</td>
                                        <td class="checkout__total--amount text-right">-€{{ $item->value }}</td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                                <tfoot class="checkout__total--footer">
                                <tr class="checkout__total--footer__items">
                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">{{ __('names.total') }}</td>
                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right">€{{ number_format($amount,2) }}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {!! Form::open(['route' => ['pay', $role], 'method' => 'post']) !!}
                        <button class="checkout__now--btn primary__btn" type="submit">{{ __('buttons.placeOrder') }}</button>
                        {!! Form::close() !!}
                    </aside>
                </div>
            </div>
        </div>
    </div>

@endsection

