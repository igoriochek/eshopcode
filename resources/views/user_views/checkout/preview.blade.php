@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'viewcart',
    'secondPageName' => __('names.cart'),
    'hasThirdPage' => true,
    'thirdPageName' => __('names.checkoutPreview')
])

    <div class="checkout-section section-padding-01">
        <div class="container custom-container">
            <div class="row gy-8">
                <div class="col-lg-5">
                    <div class="checkout-order">
                        <h4 class="checkout-order__title text-center">{{ __('names.yourOrder') }}</h4>
                        <div class="checkout-order__details table-responsive">
                            <table class="table">
                                <tbody>
                                @foreach($cartItems as $item)
                                    <tr class="checkout-order__cart-item">
                                        <td class="checkout-order__info">
                                            <div class="checkout-order__product">
                                                <div class="checkout-order__product-thumbnail">
                                                    <img alt="{{ $item['product']->name }}" width="80" height="80"
                                                         src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/product/product-1.png @endif">
                                                </div>
                                                <div class="checkout-order__product-caption">
                                                    <h3 class="checkout-order__name">{{ $item['product']->name }}<span
                                                            class="quantity">x {{ $item->count }}</span></h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="checkout-order__total">
                                            <span class="sale-price">{{ number_format($item->price_current * $item->count,2) }} €</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="checkout-order">
                        <h4 class="checkout-order__title text-center">{{ __('names.overview') }}</h4>
                        <div class="checkout-order__details table-responsive pt-5">
                            <table class="table" style="border: none;">
                                <tfoot>
                                @if ($discounts)
                                    <tr class="cart-subtotal border-top-0">
                                        <th>
                                            {{ __('table.subTotal') }}
                                        </th>
                                        <td class="text-end">
                                            <span class="subtotal-price">{{ number_format($cart->sum,2) }} €</span>
                                        </td>
                                    </tr>
                                    <tr class="cart-shipping">
                                        <th>
                                            <span class="text-muted">{{ __('names.discountCoupon') }}</span>
                                        </th>
                                    </tr>
                                    @foreach($discounts as $item)
                                        <tr class="total">
                                            <th>
                                                <span class="text-muted">{{ $item->code }} - {{ $item->value }}% {{ __('names.off') }}</span>
                                            </th>
                                            <td class="text-end">
                                                <span class="shipping-fee text-success">- {{ number_format($item->value,2) }} €</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                    <tr class="order-total border-top-0">
                                        <th>
                                          {{__('names.total')}}
                                        </th>
                                        <td class="text-end">
                                           <span class="total-price">{{ number_format($amount,2) }} €</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                        <button type="submit" class="w-100 btn btn-primary btn-hover-secondary mt-5">{{ __('buttons.placeOrder') }}</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

