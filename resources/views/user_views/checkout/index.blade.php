@extends('layouts.app')

@section('content')
<div class="container checkout">
    <div class="row">
        <div class="col">
            <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
                <li class="text-transform-none me-3">
                    <a href="{{ url('user/viewcart') }}" class="done">{{ __('Cart') }}</a>
                </li>
                <li class="text-transform-none text-color-grey-lighten me-3">
                    <i class="fa-solid fa-angle-right me-2"></i>
                    <span class="active">{{ __('Checkout') }}</span>
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
    <div class="row">
        <div class="col text-center">
            <p>{{ __('Want to apply a discount to your cart?') }}
                <a href="#" class="open-apply-coupon" data-bs-toggle="collapse" data-bs-target=".coupon-form-wrapper" aria-expanded="true">
                    {{ __('Select discount coupon') }}
                </a>
            </p>
        </div>
    </div>
    <div class="row justify-content-center coupon-form-wrapper mb-5 collapse show">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                        <div class="d-flex align-items-center flex-column flex-md-row">
                            <select name="discount[]" class="form-control h-auto border-radius-0 line-height-1 py-3">
                                <option value="" class="text-muted">{{ __('---') }}</option>
                                @foreach($discounts as $item)
                                    <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->value }}% {{ __('OFF') }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn apply-coupon-button mt-4 mt-md-0 ms-0 ms-md-3">{{ __('Apply Coupon') }}</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 position-relative">
                <div class="pin-wrapper">
                    <div class="card border-width-3 border-radius-0 border-color-hover-dark">
                        <div class="card-body">
                            <h6 class="fw-bold text-uppercase mb-3">{{ __('Your order') }}</h6>
                            <table class="shop_table cart-totals mb-3">
                                <tbody>
                                <tr>
                                    <td colspan="2" class="border-bottom">
                                        <strong class="text-dark">{{ __('Product') }}</strong>
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
                                                €{{ $cart->sum }}
                                            </span>
                                        </strong>
                                    </td>
                                </tr>
                                <tr class="total border-bottom">
                                    <td>
                                        <strong class="text-dark">{{ __('Total') }}</strong>
                                    </td>
                                    <td class="text-end">
                                        <strong class="text-color-dark">
                                            <span class="amount text-dark text-5">€{{ $cart->sum }}</span>
                                        </strong>
                                    </td>
                                </tr>
                                <tr class="payment-methods border-bottom">
                                    <td colspan="2">
                                        <strong class="d-block text-dark mb-2">{{ __('Payment Methods') }}</strong>
                                        <div class="d-flex flex-column">
                                            <label class="d-flex align-items-center text-muted mb-0" for="payment_method1">
                                                <input id="payment_method1" type="radio" class="me-2" name="payment_method" value="cash-on-delivery" checked="">
                                                {{ __('Paysera') }}
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        {{ __('Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.') }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center w-100">
                                <button type="submit" class="btn preview-button">
                                    {{ __('Preview') }}
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
@endsection

