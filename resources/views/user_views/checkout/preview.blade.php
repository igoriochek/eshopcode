@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">{{__('names.checkout')}}</h1>
                </div>
                <!-- End col-lg-8 mb-40-->
            </div>
            <!-- End row -->
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="border p-40 cart-totals ml-30 mb-50">
                        <div class="table-responsive order_table checkout">
                            <h5 class="fw-bold text-muted text-uppercase mb-3 text-center">{{ __('names.yourOrder') }}</h5>
                            <table class="table no-border">
                                <tbody>
                                <tr>
                                    <th scope="col" ></th>
                                    <th scope="col" class="text-muted">{{__('table.product')}}</th>
                                    <th scope="col" class="text-muted pl-20 pr-20">{{__('table.count')}}</th>
                                    <th scope="col" class="text-muted pl-20 pr-20">{{__('table.price')}}</th>
                                </tr>
                                @foreach($cartItems as $item)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <a href="{{ route('viewproduct', $item['product']->id) }}" title="{{ $item['product']->name }}">
                                                <img alt="{{ $item['product']->name }}" class="product-thumbnail-image"
                                                     src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/noimage.jpeg @endif">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <h6 class="w-160 mb-5">
                                                <a class="text-heading"
                                                   href="{{ route('viewproduct', $item['product']->id) }}">
                                                    {{ $item['product']->name }}
                                                </a>
                                            </h6>
                                        </td>
                                        <td class="product-quantity">
                                            <h6 class="text-muted pl-20 pr-20">x {{ $item->count }}</h6>
                                        </td>
                                        <td class="product-subtotal">
                                            <h5 class="text-brand">
                                                {{ number_format($item->price_current * $item->count,2) }} €
                                            </h5>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="cart-action d-flex justify-content-between ml-30">
                        <a class="btn " href="{{ url('/user/viewcart') }}"><i class="fas fa-arrow-left ms-2"></i> {{__('buttons.back')}}</a>
                    </div>
                </div>
                <!-- End col-lg-5 -->
                <div class="col-lg-6">
                    <div class="border p-md-4 cart-totals ml-30">
                        <h5 class="fw-bold text-muted text-uppercase mb-3 text-center">{{ __('names.overview') }}</h5>
                        <div class="divider-2 mb-30"></div>
                        <div class="table-responsive mt-20">
                            <table class="table no-border">
                                <tbody>
                                @if ($discounts)
                                    <tr class="cart-subtotal border-bottom">
                                        <td>
                                            <h6 class="text-heading">{{ __('table.subTotal') }}</h6>
                                        </td>
                                        <td class="text-end">
                                            <strong>
                                                <h5 class="text-brand text-end">{{ number_format($cart->sum,2) }} €</h5>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr class="cart-discount">
                                        <td>
                                            <h6 class="text-muted">{{ __('names.discountCoupon') }}</h6>
                                        </td>
                                    </tr>
                                    @foreach($discounts as $item)
                                        <tr class="border-bottom">
                                            <td>
                                                <h6 class="text-muted">{{ $item->code }} - {{ $item->value }}% {{ __('names.off') }}</h6>
                                            </td>
                                            <td class="text-end">
                                                <h5 class="text-danger">- {{ number_format($item->value,2) }} €</h5>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr class="total">
                                    <td>
                                        <h6 class="text-heading">{{__('names.total')}}</h6>
                                    </td>
                                    <td class="text-end">
                                        <h5 class="text-brand text-end">{{ number_format($amount,2) }} €</h5>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                        <button type="submit" class="btn  mr-20 w-100">{{ __('buttons.placeOrder') }}<i class="fas fa-arrow-right ms-2"></i></button>
                        {!! Form::close() !!}
                </div>
                <!-- End col-lg-6 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container mb-80 mt-50 -->
    </div>
    <!-- End container py-5 -->
@endsection

