@extends('layouts.app')

@section('title', __('names.preview'))
@section('parentTitle', __('names.checkout'))
@section('parentUrl', url('/user/checkout'))

@section('content')
    <div class="checkout-area pt-70 pb-45">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="cart-sidebar">
                        {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                            <div class="payment-method">
                                <h3>{{ __('names.paymentMethods') }}</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="payment_method1" name="payment_method" value="cash-on-delivery" checked disabled>
                                    <label class="form-check-label" for="payment_method1">
                                        {{ __('Paysera') }}
                                    </label>
                                </div>
                            </div>
                            <div class="check-out-summary">
                                <h3>{{ __('names.yourOrder') }}</h3>
                                <ul>
                                    @foreach($cartItems as $item)
                                        <li>{{ $item['product']->name }} {{ 'x'.$item->count }} <span>€{{ number_format(($item->price_current * $item->count),2) }}</span></li>
                                    @endforeach
                                    @if ($discounts)
                                        @foreach($discounts as $item)
                                            <li>{{ __('names.discountCoupon').' ('.$item->code.')'  }} <span>-€{{ number_format($item->value, 2) }}</span></li>
                                        @endforeach
                                    @endif
                                    <li>{{ __('names.total') }} <span>€{{ $amount }}</span></li>
                                </ul>
                                <button type="submit" class="default-btn style5">
                                    {{ __('buttons.placeOrder')  }}
                                </button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @extends('layouts.app')

@section('content')
    <div class="container checkout">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
                    <li class="text-transform-none me-3">
                        <a href="{{ url('user/viewcart') }}" class="done">{{ __('names.cart') }}</a>
                    </li>
                    <li class="text-transform-none text-color-grey-lighten me-3">
                        <i class="fa-solid fa-angle-right me-2"></i>
                        <a href="{{ url('user/checkout') }}" class="done">{{ __('names.checkout') }}</a>
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
        {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 position-relative">
                    <div class="pin-wrapper">
                        <div class="card border-width-3 border-radius-0 border-color-hover-dark">
                            <div class="card-body">
                                <h6 class="fw-bold text-uppercase mb-3">{{ __('names.yourOrder') }}</h6>
                                <table class="shop_table cart-totals mb-5 w-100">
                                    <tbody>
                                    <tr>
                                        <td colspan="2" class="border-bottom">
                                            <strong class="text-dark">{{ __('names.product') }}</strong>
                                        </td>
                                    </tr>
                                    @foreach($cartItems as $item)
                                        <tr class="cart-item">
                                            <td>
                                                <strong class="d-block text-dark line-height-1">
                                                    {{ $item['product']->name }}
                                                    <span class="product-qty">x{{ $item->count }}</span>
                                                </strong>
                                            </td>
                                            <td class="text-end align-top">
                                                <span class="amount text-muted">€{{ $item->price_current * $item->count }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="cart-subtotal border-bottom">
                                        <td>
                                            <strong class="text-dark">{{ __('Subtotal') }}</strong>
                                        </td>
                                        <td class="border-top-0 text-end">
                                            <strong>
                                                <span class="amount font-weight-medium">
                                                    €{{ number_format($cart->sum,2) }}
                                                </span>
                                            </strong>
                                        </td>
                                    </tr>
                                    @if ($discounts)
                                        <tr class="cart-discount">
                                            <td>
                                                <strong class="text-dark">{{ __('names.discountCoupon') }}</strong>
                                            </td>
                                        </tr>
                                        @foreach($discounts as $item)
                                            <tr class="border-bottom">
                                                <td class="text-dark">{{ $item->code }} - {{ $item->value }}% {{ __('names.off') }}</td>
{{--                                                <td colspan="3" style="text-align: right">-€{{ $amount * ($item->value / 100) }}</td>--}}
                                                {{-- <td colspan="3" style="text-align: right">-€{{ $item->value }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr class="total border-bottom">
                                        <td>
                                            <strong class="text-dark">{{ __('names.total') }}</strong>
                                        </td>
                                        <td class="text-end">
                                            <strong class="text-color-dark">
                                                <span class="amount text-dark text-5">€{{ $amount }}</span>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr class="payment-methods">
                                        <td colspan="2">
                                            <strong class="d-block text-dark mb-2">{{ __('names.paymentMethods') }}</strong>
                                            <div class="d-flex flex-column">
                                                <label class="d-flex align-items-center text-muted mb-0" for="payment_method1">
                                                    <input id="payment_method1" type="radio" class="me-2" name="payment_method" value="cash-on-delivery" checked="" disabled>
                                                    {{ __('Paysera') }}
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center w-100">
                                    <button type="submit" class="btn preview-button">
                                        {{ __('buttons.placeOrder') }}
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection --}}

