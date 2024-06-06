@extends('layouts.app')

@section('title', __('menu.discountCoupons'))

@section('content')
<div class="blog-area section-space-y-axis-100">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                @include('flash_messages')
            </div>
            <p class="fs-6">
                    @if (count($discountCoupons) > 0)
                        {{ __('names.showing') }}
                        @if ($discountCoupons->currentPage() !== $discountCoupons->lastPage())
                            {{ ($discountCoupons->count() * $discountCoupons->currentPage() - $discountCoupons->count() + 1).__('–').($discountCoupons->count() * $discountCoupons->currentPage()) }}
                        @else
                            @if ($discountCoupons->total() - $discountCoupons->count() === 0)
                                {{ $discountCoupons->count() }}
                            @else
                                {{ ($discountCoupons->total() - $discountCoupons->count()).__('–').$discountCoupons->total() }}
                            @endif
                        @endif
                        {{ __('names.of') }}
                        {{ $discountCoupons->total().' '.__('names.entries') }}
                    @endif
                </p>
                @forelse($discountCoupons as $discountCoupon)
                    <div class="col-xl-6 py-3">
                        <div class="widgets-area">
                            <div class="d-flex" style="justify-content: space-between;">
                                <h1 class="widgets-title mb-5 me-3">{{ __('names.discountCouponValue') }}</h1>
                                <div class="widgets-item">
                                    <p class="tp-coupon-offer mb-5">
                                        <span>{{ $discountCoupon->value }}%</span>
                                        {{ __('names.off') }}
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex" style="justify-content: space-between;">
                                    <h4>
                                        {{ __('names.coupon') }} 
                                        @if ($discountCoupon->used)
                                            <span class="text-danger">{{ __('names.used') }}</span>
                                        @else
                                            <span class="active">{{ __('names.active') }}</span>
                                        @endif
                                    </h4>
                                <div class="tp-coupon-date">
                                    <span>{{ $discountCoupon->code }}</span>
                                </div>
                            </div>

                        </div>

                        <!-- <div class="tp-coupon-item mb-30 p-relative d-md-flex justify-content-between align-items-center">
                        <span class="tp-coupon-border"></span>
                        <div class="tp-coupon-item-left d-sm-flex align-items-center">
                            <div class="tp-coupon-content">
                                <h3 class="tp-coupon-title">{{ __('names.discountCouponValue') }}</h3>
                                <p class="tp-coupon-offer mb-0">
                                <span>{{ $discountCoupon->value }}%</span>
                                {{ __('names.off') }}
                                </p>
                            </div>
                        </div>
                        <div class="tp-coupon-item-right pl-20">
                            <div class="tp-coupon-status mb-10 d-flex align-items-center">
                                <h4>
                                    {{ __('names.coupon') }} 
                                    @if ($discountCoupon->used)
                                        <span class="text-danger">{{ __('names.used') }}</span>
                                    @else
                                        <span class="active">{{ __('names.active') }}</span>
                                    @endif
                                </h4>
                            </div>
                            <div class="tp-coupon-date">
                                <span>{{ $discountCoupon->code }}</span>
                            </div>
                        </div>
                        </div> -->
                    </div>
                @empty
                    <span class="text-muted">{{ __('names.noDiscountCoupons') }}</span>
                @endforelse
                <div class="tp-shop-pagination mt-20">
                    <div class="tp-pagination">
                        @if (!empty($discountCoupons->count()))
                            {{ $discountCoupons->onEachSide(1)->links() }}
                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>




<!-- <div class="tp-coupon-area pb-120">
        <div class="container">
           <div class="row">
                <div class="col-12 mb-4">
                    @include('flash_messages')
                </div>
                <p class="fs-6">
                    @if (count($discountCoupons) > 0)
                        {{ __('names.showing') }}
                        @if ($discountCoupons->currentPage() !== $discountCoupons->lastPage())
                            {{ ($discountCoupons->count() * $discountCoupons->currentPage() - $discountCoupons->count() + 1).__('–').($discountCoupons->count() * $discountCoupons->currentPage()) }}
                        @else
                            @if ($discountCoupons->total() - $discountCoupons->count() === 0)
                                {{ $discountCoupons->count() }}
                            @else
                                {{ ($discountCoupons->total() - $discountCoupons->count()).__('–').$discountCoupons->total() }}
                            @endif
                        @endif
                        {{ __('names.of') }}
                        {{ $discountCoupons->total().' '.__('names.entries') }}
                    @endif
                </p>
                @forelse($discountCoupons as $discountCoupon)
                    <div class="col-xl-6">
                        <div class="tp-coupon-item mb-30 p-relative d-md-flex justify-content-between align-items-center">
                        <span class="tp-coupon-border"></span>
                        <div class="tp-coupon-item-left d-sm-flex align-items-center">
                            <div class="tp-coupon-content">
                                <h3 class="tp-coupon-title">{{ __('names.discountCouponValue') }}</h3>
                                <p class="tp-coupon-offer mb-0">
                                <span>{{ $discountCoupon->value }}%</span>
                                {{ __('names.off') }}
                                </p>
                            </div>
                        </div>
                        <div class="tp-coupon-item-right pl-20">
                            <div class="tp-coupon-status mb-10 d-flex align-items-center">
                                <h4>
                                    {{ __('names.coupon') }} 
                                    @if ($discountCoupon->used)
                                        <span class="text-danger">{{ __('names.used') }}</span>
                                    @else
                                        <span class="active">{{ __('names.active') }}</span>
                                    @endif
                                </h4>
                            </div>
                            <div class="tp-coupon-date">
                                <span>{{ $discountCoupon->code }}</span>
                            </div>
                        </div>
                        </div>
                    </div>
                @empty
                    <span class="text-muted">{{ __('names.noDiscountCoupons') }}</span>
                @endforelse
                <div class="tp-shop-pagination mt-20">
                    <div class="tp-pagination">
                        @if (!empty($discountCoupons->count()))
                            {{ $discountCoupons->onEachSide(1)->links() }}
                        @endif
                    </div>
                </div>
           </div>
        </div>
     </div> -->
@endsection