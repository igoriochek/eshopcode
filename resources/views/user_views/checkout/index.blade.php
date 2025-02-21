@extends('layouts.app')

@section('title', __('names.checkout'))

@section('content')
<div class="Checkout_section">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="user-actions">
                    <h3>
                        {{ __('names.haveACoupon') }}
                        <a id="checkout_coupon_button" class="Returning" href="#">{{ __('names.selectDiscountCoupon') }}</a>
                    </h3>
                    <div id="checkout_coupon" class="collapse" >
                        <div class="checkout_info coupon_info mt-2">
                            {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post', 'class' => 'mb-0']) !!}
                            <select class="select_option" name="discount[]">
                                <option value="" class="text-muted">{{ __('---') }}</option>
                                @foreach ($discounts as $item)
                                <option value="{{ $item->id }}">{{ $item->code }}
                                    -€{{ number_format($item->value, 2) }}</option>
                                @endforeach
                            </select>
                            <button class="apply_button" type="submit">{{ __('buttons.applyCoupon') }}</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout_form">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <h3>{{ __('names.yourOrder') }}</h3>
                    <div class="order_table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>{{ __('names.product') }}</th>
                                    <th>{{ __('names.total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td>{{ $item['product']->name }}<strong>{{ ' × ' . $item->count }}</strong></td>
                                    <td>€{{ number_format(($item->price_current * $item->count),2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="order_total">
                                    <th>{{ __('names.subtotal') }}</th>
                                    <td><strong>€{{ number_format($cart->sum, 2) }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="panel-default d-flex justify-content-center">
                            <p class="paypal">PayPal
                                <img src="{{ asset('images/1_Paysera logo for light background.svg') }}" style="width: 100px !important;" alt="payment">
                            </p>
                        </div>
                        {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                        <div class="order_button d-flex justify-content-center">
                            <button type="submit">{{ __('buttons.preview') }}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .apply_button {
        width: 130px;
        background: #222222;
        color: #ffffff;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 13px;
        cursor: pointer;
        transition: 0.3s;
        border: 0;
        height: 42px;
        line-height: 42px;
        border-radius: 3px;
        margin-left: 5px;
        font-family: inherit;
    }

    .apply_button:hover {
        background: #79a206;
        color: #ffffff;
    }

    .payment_method {
        display: flex;
        flex-direction: column;
    }

    .paypal {
        font-weight: 500;
        margin-bottom: 10px !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
      const button = document.getElementById('checkout_coupon_button');
      const checkoutCoupon = document.getElementById('checkout_coupon');

      button.addEventListener('click', function (event) {
        event.preventDefault(); 
        checkoutCoupon.classList.toggle('show');
      });
    });
</script>