@extends('layouts.app')

@section('title', __('names.checkout'))

@section('content')
    <div class="axil-checkout-area axil-section-gap">
        <div class="container">
            <div class="row justify-content-center">
                @if (count($discounts) > 0)
                    <div class="col-lg-8 col-12">
                        {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                        <div class="axil-checkout-notice">
                            <div class="axil-toggle-box">
                                <div class="toggle-bar">
                                    <i class="fas fa-pencil"></i>
                                    <a href="javascript:void(0)" class="toggle-btn">
                                        {{ __('names.selectDiscountCoupon') }}
                                    </a>
                                </div>
                                <div class="axil-checkout-coupon toggle-open" style="display: none;">
                                    <div class="input-group gap-3">
                                        <select name="discount[]" class="form-control fs-4 ps-4" style="border-radius: 6px">
                                            <option value="" class="text-muted">{{ __('---') }}</option>
                                            @foreach ($discounts as $item)
                                                <option value="{{ $item->id }}">{{ $item->code }}
                                                    -€{{ number_format($item->value, 2) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="apply-btn">
                                            <button type="submit" class="axil-btn btn-bg-primary"
                                                style="padding-block: 14px">
                                                {{ __('buttons.applyCoupon') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                @endif
                <div class="col-lg-8 col-12">
                    {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                    <div class="axil-order-summery order-checkout-summery">
                        <h5 class="title mb--20">{{ __('names.yourOrder') }}</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table">
                                <thead>
                                    <tr>
                                        <th>{{ __('names.product') }}</th>
                                        <th>{{ __('names.subtotal') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr class="order-product">
                                            <td>{{ $item['product']->name }} {{ 'x' . $item->count }}</td>
                                            <td>€{{ number_format($item->price_current * $item->count, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr class="order-total">
                                        <td>{{ __('names.total') }}</td>
                                        <td class="order-total-amount">€{{ number_format($cart->sum, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-payment-method">
                            <h5 class="title mb--20">{{ __('names.paymentMethods') }}</h5>
                            <div class="single-payment">
                                <div class="input-group justify-content-between align-items-center">
                                    <input type="radio" id="payment_method1" name="payment_method"
                                        value="cash-on-delivery" checked>
                                    <label for="payment_method1">{{ __('Paysera') }}</label>
                                    <img src="{{ asset('images/1_Paysera logo for light background.svg') }}" alt="Paypal"
                                        width="100px">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="axil-btn btn-bg-primary checkout-btn" style="width: fit-content">
                            {{ __('buttons.preview') }}
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
