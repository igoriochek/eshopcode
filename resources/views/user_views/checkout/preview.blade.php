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
                <div class="col-xxl-8 col-xl-7 col-lg-6 mb-50 px-0">
                    <div class="border cart-totals">
                        <div class="table-responsive order_table checkout">
                            <h5 class="fw-bold text-black text-uppercase mb-4 text-center">{{ __('names.yourOrder') }}</h5>
                            <div class="d-flex flex-column mb-15" style="border: 1px solid #eee; overflow: scroll; box-shadow: 1px 1px 10px #f5f5f5">
                                <div style="min-width: 600px;">
                                    <div class="d-flex gap-3 fs-6 fw-bold ps-xl-0 ps-4" style="border-bottom: 2px solid #f5f5f5">
                                        <div class="d-flex align-items-center py-3" style="width: 30%"></div>
                                        <div class="d-flex align-items-center py-3" style="width: 40%">{{ __('table.product') }}</div>
                                        <div class="d-flex align-items-center py-3" style="width: 15%">{{ __('table.count') }}</div>
                                        <div class="d-flex align-items-center py-3" style="width: 15%">{{ __('table.subTotal') }}</div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        @forelse($cartItems as $item)
                                            <div class="d-flex gap-3 text-dark py-4 ps-xl-0 ps-4 fw-bold" style="@if (!$loop->last) border-bottom: 2px solid #f5f5f5; @endif font-size: calc(1rem + .1vw)">
                                                <div class="d-flex align-items-center justify-content-center py-1" style="width: 30%">
                                                    <a href="{{ route('viewproduct', $item['product']->id) }}" title="{{ $item['product']->name }}" class="d-flex align-items-center justify-content-center">
                                                        <img alt="{{ $item['product']->name }}" class="img-fluid" width="150" style="border-radius: 10px"
                                                             src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/noimage.jpeg @endif">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center gap-1" style="width: 40%">
                                                    <a href="{{ route('viewproduct', $item['product']->id) }}" class="product-name">
                                                        {{ $item['product']->name }}
                                                    </a>
                                                    <div class="d-flex flex-column">
                                                        @if ($item->product_size_id)
                                                            <span class="fw-normal fs-6" style="color: #888">
                                                                {{ __('names.size').': '.$item->itemSize->name }}
                                                            </span>
                                                        @endif
                                                        @if ($item->product_meat_id)
                                                            <span class="fw-normal fs-6" style="color: #888">
                                                                {{ __('names.meat').': '.$item->meat->name }}
                                                            </span>
                                                        @endif
                                                        @if ($item->product_sauce_id)
                                                            <span class="fw-normal fs-6" style="color: #888">
                                                                {{ __('names.sauce').': '.$item->sauce->name }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center" style="width: 15%; color: #888">
                                                    {{ $item->count }}
                                                </div>
                                                <div class="d-flex align-items-center" style="width: 15%; color: #dc0505">
                                                    €{{ number_format($item->price_current * $item->count, 2) }}
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-lg-5 -->
                <div class="col-xxl-4 col-xl-5 col-lg-6 px-0">
                    <div class="border p-md-4 cart-totals ml-30">
                        <h5 class="fw-bold text-black text-uppercase mb-3 text-center">{{ __('names.overview') }}</h5>
                        <div class="divider-2 mb-20"></div>
                        <div class="d-flex flex-column gap-2">
                            <p class="d-flex justify-content-center gap-2 mb-15">
                                {{ __('table.collectTime') }}: <strong>{{ $cart->collect_time }}</strong>
                            </p>
                            @if ($discounts)
                                <div class="d-flex align-items-center justify-content-between border-bottom pb-2">
                                    <h6 class="text-heading">{{ __('table.subTotal') }}</h6>
                                    <h5 class="text-brand text-end">€{{ number_format($cart->sum, 2) }}</h5>
                                </div>
                                @foreach($discounts as $item)
                                    <div class="d-flex align-items-center justify-content-between border-bottom pb-2">
                                        <h6 class="text-heading">{{ $item->code }} - {{ $item->value }}% {{ __('names.off') }}</h6>
                                        <h5 class="text-brand text-end">- €{{ number_format($discountedAmount, 2) }}</h5>
                                    </div>
                                @endforeach
                            @endif
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="text-heading">{{__('names.total')}}</h6>
                                <h5 class="text-brand text-end">€{{ number_format($amount, 2) }}</h5>
                            </div>
                        </div>
                        {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                            <button type="submit" class="btn mr-20 w-100 border-0">
                                {{ __('buttons.placeOrder') }}
                                <i class="fas fa-arrow-right ms-2"></i>
                            </button>
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

@push('css')
      <style>
          .product-name {
              color: #222;
          }
          .product-name:hover,
          .product-name:focus {
              color: #dc0505;
          }
      </style>
@endpush
