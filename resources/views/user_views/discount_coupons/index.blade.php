@extends('layouts.app')

@section('content')
    @include('header', ['title' => __('names.discountCoupons')])
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="row mb-4 align-items-center">
                        <div class="col-lg-12">
                            <p class="p-0 m-0 showing-all-results">
                                {{ __('names.results').': '.$discountCoupons->count() }}
                            </p>
                        </div>
                    </div>
                    <hr class="hr"/>
                    <div class="row">
                        @if(($discountCoupons->count()))
                            @foreach($discountCoupons as $discountCoupon)
                                <div class="discount-coupon p-4 mb-4 mb-sm-5">
                                    <h4>
                                        <a class="discount-coupon-title" href="{{ route('viewproduct', $discountCoupon->id) }}">
                                            {{ $discountCoupon->code }}
                                        </a>
                                    </h4>
                                    <p class="discount-coupon-description">{{ $discountCoupon->value }}</p>
                                </div>
                            @endforeach
                        @else
                            <span class="discount-coupons-empty">
                                {{ __('names.noDiscount') }}
                            </span>
                        @endif
                        @if (!empty($discountCoupons->count())) {{ $discountCoupons->links() }} @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
