@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("discountCoupons") ,'title' => __('names.discountCoupons')])
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="row">
                        @if(($discountCoupons->count()))
                            @foreach($discountCoupons as $discountCoupon)
                                <div class="discount-coupon p-4 mb-4 mb-sm-5">
                                    <h4>
                                        <a class="discount-coupon-title" href="{{ route('viewproduct', $discountCoupon->id) }}">
                                            {{__('names.discountCouponCode')}}: {{ $discountCoupon->code }}
                                        </a>
                                    </h4>
                                    <p class="discount-coupon-description">{{__('names.discountCouponValue')}}: {{ number_format($discountCoupon->value,2) }} €</p>
                                </div>
                            @endforeach
                        @else
                            <span class="discount-coupons-empty">
                                {{ __('names.noDiscountCoupons') }}
                            </span>
                        @endif
                        @if (!empty($discountCoupons->count())) {{ $discountCoupons->links() }} @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
