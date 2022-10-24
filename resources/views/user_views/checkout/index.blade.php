@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'viewcart',
    'secondPageName' => __('names.cart'),
    'hasThirdPage' => true,
    'thirdPageName' => __('names.checkout')
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
                        <div class="checkout-form__info text-center">
                            <p>{{ __('names.wantToApply') }}</p>
                            {!! Form::open(['route' => ['checkout-preview'],'method' => 'post']) !!}
                            <div class="d-flex align-items-center flex-column flex-md-row">
                                <select name="discount[]" class="form-control h-auto border-radius-0 line-height-1">
                                    <option value="" class="text-muted">{{ __('---') }}</option>
                                    @foreach($discounts as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->value }}
                                            EU {{ __('names.off') }}</option>
                                    @endforeach
                                </select>
                                <p><button type="submit" class="info-toggle">{{ __('buttons.applyCoupon') }}</button></p>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="checkout-order__details table-responsive pt-5">
                            <table class="table">
                                <tfoot>
                                    <tr class="order-total">
                                        <th>
                                            {{__('names.total')}}
                                        </th>
                                        <td class="text-end">
                                            <span class="total-price">{{number_format($cart->sum,2) }} €</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                        <button type="submit" class="w-100 btn btn-primary btn-hover-secondary mt-5">{{__('buttons.preview')}}</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

