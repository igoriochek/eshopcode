@extends('layouts.app')

@section('title', __('names.checkout'))

@section('content')
    <div class="checkout-area section-space-y-axis-100">
        <div class="container">
            @if (!$discounts->isEmpty())
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-12">
                        <div class="coupon-accordion">
                            <h3>
                                <span id="showcoupon">{{ __('names.selectDiscountCoupon') }}</span>
                            </h3>
                            <div id="checkout_coupon" class="coupon-checkout-content" style="display: none;">
                                <div class="coupon-info">
                                    {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                                    <div class="d-flex align-items-center gap-2">
                                        <select name="discount[]" class="form-control rounded-0"
                                            style="width: 200px; height: 40px">
                                            <option value="" class="text-muted">{{ __('---') }}</option>
                                            @foreach ($discounts as $item)
                                                <option value="{{ $item->id }}">{{ $item->code }}
                                                    -€{{ number_format($item->value, 2) }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-dark rounded-0"
                                            style="width: fit-content; height: 40px">
                                            {{ __('buttons.applyCoupon') }}
                                        </button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-12">
                    <div class="your-order">
                        <h3>{{ __('names.yourOrder') }}</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">{{ __('names.product') }}
                                        </th>
                                        <th class="cart-product-total">{{ __('names.price') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                {{ $item['product']->name }}
                                                <strong class="product-quantity">{{ 'x ' . $item->count }}</strong>
                                            </td>
                                            <td class="cart-product-total">
                                                <span class="amount">
                                                    €{{ number_format($item->price_current * $item->count, 2) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <th>{{ __('names.total') }}</th>
                                        <td>
                                            <strong>
                                                <span class="amount">€{{ number_format($cart->sum, 2) }}</span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post', 'class' => 'payment-method mt-0']) !!}
                        <div class="payment-accordion">
                            <div id="accordion">
                                <div class="card">
                                    <div class="widgets-area bg-transparent px-0">
                                        <h5 class="mb-5">{{ __('names.paymentMethods') }}</h5>
                                        <div class="widgets-item">
                                            <ul class="widgets-checkbox">
                                                <li>
                                                    <input class="input-checkbox" type="checkbox" id="payment_method1"
                                                        checked disabled>
                                                    <label class="label-checkbox mb-0" for="payment_method1">
                                                        {{ __('Paysera') }}
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-button-payment">
                                <input value="Place order" type="submit">
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
