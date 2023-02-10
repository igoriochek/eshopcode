@extends('layouts.app')

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow">
                    <i class="fi-rs-home mr-5"></i>
                    {{ __('menu.home') }}
                </a>
                <span></span>
                <a href="{{ url("/user/viewcart") }}">
                    {{ __('menu.cart') }}
                </a>
                <span></span>
                <a href="{{ url("/user/checkout") }}">
                    {{ __('names.checkout') }}
                </a>
                <span></span>
                {{ __('buttons.preview') }}
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="container mb-10 mt-20">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">{{ __('buttons.preview') }}</h1>
                </div>
                <!-- End col-lg-8 mb-40-->
            </div>
            <!-- End row -->
            <div class="row justify-content-center px-0">
                <div class="col-lg-7 mb-50">
                    <div class="border p-40 cart-totals mb-50">
                        <div class="table-responsive order_table checkout">
                            <h5 class="fw-bold text-black text-uppercase mb-3 text-center">{{ __('names.yourOrder') }}</h5>
                            <table class="table no-border">
                                <tbody>
                                <tr>
                                    <th scope="col" ></th>
                                    <th scope="col" class="text-dark">{{__('table.product')}}</th>
                                    <th scope="col" class="text-dark pl-20 pr-20">{{__('table.count')}}</th>
                                    <th scope="col" class="text-dark pl-20 pr-20">{{__('table.price')}}</th>
                                </tr>
                                @foreach($cartItems as $item)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <a href="{{ route('viewproduct', $item['product']->id) }}" title="{{ $item['product']->name }}">
                                                <img alt="{{ $item['product']->name }}" class="product-thumbnail-image" style="border: 2px solid white"
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
                </div>
                <!-- End col-lg-5 -->
                <div class="col-lg-5 px-0">
                    <div class="border p-md-4 cart-totals ml-30">
                        <h5 class="fw-bold text-black text-uppercase mb-3 text-center">{{ __('names.overview') }}</h5>
                        <div class="divider-2 mb-20"></div>
                        <div class="table-responsive mt-20 mb-10">
                            <table class="table no-border" style="border: 2px solid white">
                                <tbody>
                                <p class="d-flex justify-content-center gap-2 mb-10">
                                    {{ __('table.collectTime') }}: <strong>{{ $cart->collect_time }}</strong>
                                </p>
                                @if ($discounts)
                                    <tr class="cart-subtotal border-bottom">
                                        <td>
                                            <h6 class="text-dark">{{ __('table.subTotal') }}</h6>
                                        </td>
                                        <td class="text-end">
                                            <strong>
                                                <h5 class="text-dark text-end">{{ number_format($cart->sum,2) }} €</h5>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr class="cart-discount">
                                        <td>
                                            <h6 class="text-dark">{{ __('names.discountCoupon') }}</h6>
                                        </td>
                                    </tr>
                                    @foreach($discounts as $item)
                                        <tr class="border-bottom">
                                            <td>
                                                <h6 class="text-dark">{{ $item->code }} - {{ $item->value }}% {{ __('names.off') }}</h6>
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

