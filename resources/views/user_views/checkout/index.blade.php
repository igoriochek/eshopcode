@extends('layouts.app')

@section('title', __('names.checkout'))

@section('content')
    <div class="checkout-area pt-70 pb-45">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="cart-sidebar">
                        @if (!$discounts->isEmpty())
                            <div class="check-out-summary">
                                <h3>{{ __('names.selectDiscountCoupon') }}</h3>
                                {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                                    <div class="single-shop-sidebar-widget search-bar p-0 mb-0">
                                        <div class="form-group">
                                            <select name="discount[]" class="form-control">
                                                <option value="" class="text-muted">{{ __('---') }}</option>
                                                @foreach($discounts as $item)
                                                    <option value="{{ $item->id }}">{{ $item->code }} -€{{ number_format($item->value, 2) }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="search-btn fs-6">
                                                {{ __('buttons.applyCoupon') }}
                                            </button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        @endif
                        {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
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
                                    <li>{{ __('names.total') }} <span>€{{ number_format($cart->sum, 2) }}</span></li>
                                </ul>
                                <button type="submit" class="default-btn style5">
                                    {{ __('buttons.preview') }}
                                </button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

