@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("discountCoupons") ,'title' => __('names.discountCoupons')])
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="d-flex justify-content-center gap-2 flex-column col-12 mb-4">
                        <h3 class="column-title mb-0">{{ __('menu.discountCoupons') }}</h3>
                        <span class="text-muted">{{ __('names.results').': '.$discountCoupons->total() }}</span>
                    </div>
                    <div class="row mx-0">
                        @if(($discountCoupons->count()))
                            @foreach($discountCoupons as $discountCoupon)
                                <div class="discount-coupon p-4 mb-4 mb-sm-5">
                                    <div class="d-flex align-items-center gap-2">
                                        <h5 class="discount-coupon-title fw-normal">
                                            {{ __('names.discountCouponCode') }}:
                                        </h5>
                                        <h4 class="discount-coupon-title">
                                            {{ $discountCoupon->code }}
                                        </h4>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <h5 class="discount-coupon-title fw-normal">
                                            {{ __('names.discountCouponValue') }}:
                                        </h5>
                                        <h4 class="discount-coupon-title">
                                            {{ number_format($discountCoupon->value, 2) }} €
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <span class="discount-coupons-empty">
                                {{ __('names.noDiscountCoupons') }}
                            </span>
                        @endif
                        @if (!empty($discountCoupons->count())) {{ $discountCoupons->onEachSide(1)->links() }} @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
