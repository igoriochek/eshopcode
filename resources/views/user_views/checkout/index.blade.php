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
                            <span class="active">{{ __('names.checkout') }}</span>
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
                                                <img class="display-block border-radius-5" alt="{{ $item['product']->name }}"
                                                     src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/noimage.jpeg @endif">
                                                <span class="product__thumbnail--quantity">{{ $item->count }}</span>
                                            </div>
                                            <div class="product__description">
                                                <h4 class="product__description--name">{{ $item['product']->name }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">€{{ number_format(($item->price_current * $item->count),2) }}</span>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="checkout__discount--code text-center">
                            <p>{{ __('names.wantToApply') }}</p>
                            {!! Form::open(['route' => ['checkout-preview', $role],'method' => 'post']) !!}
                                <div class="d-flex align-items-center flex-column flex-md-row">
                                <select name="discount[]" class="checkout__input--select__field border-radius-5">
                                    <option value="" class="text-muted">{{ __('---') }}</option>
                                    @foreach($discounts as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->value }}
                                            EU {{ __('names.off') }}</option>
                                    @endforeach
                                </select>
                                    <button class="checkout__discount--code__btn primary__btn border-radius-5" type="submit">{{ __('buttons.applyCoupon') }}</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="checkout__total pb-5" style="border: none">
                            <table class="checkout__total--table">
                                <tfoot class="checkout__total--footer">
                                <tr class="checkout__total--footer__items">
                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">{{ __('names.total') }}</td>
                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right">€{{ number_format($cart->sum,2) }}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        {!! Form::open(['route' => ['checkout-preview', $role], 'method' => 'post']) !!}
                        <button class="checkout__now--btn primary__btn" type="submit">{{ __('buttons.preview') }}</button>
                        {!! Form::close() !!}
                    </aside>
                </div>
            </div>
        </div>
    </div>

@endsection

