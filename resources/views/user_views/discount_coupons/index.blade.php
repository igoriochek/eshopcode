@extends('layouts.app')

@section('title', __('menu.discountCoupons'))

@section('content')
<div class="tp-coupon-area pb-120">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                @include('flash_messages')
            </div>
            @if (!empty($discountCoupons->count()))
            <p class="fs-6">
                {{ __('names.showing') }}
                @if ($discountCoupons->currentPage() !== $discountCoupons->lastPage())
                {{ $discountCoupons->count() * $discountCoupons->currentPage() - $discountCoupons->count() + 1 . __('–') . $discountCoupons->count() * $discountCoupons->currentPage() }}
                @else
                @if ($discountCoupons->total() - $discountCoupons->count() === 0)
                {{ $discountCoupons->count() }}
                @else
                {{ $discountCoupons->total() - $discountCoupons->count() . __('–') . $discountCoupons->total() }}
                @endif
                @endif
                {{ __('names.of') }}
                {{ $discountCoupons->total() . ' ' . __('names.entries') }}
            </p>
            @endif
            @forelse($discountCoupons as $discountCoupon)
            <div class="col-xl-6">
                <div class="bg-white cyber-about-box mb-30 p-relative d-md-flex justify-content-between align-items-center d-flex">
                    <div class="tp-coupon-item-left d-sm-flex align-items-center" style="width: 70%">
                        <div class="tp-coupon-content">
                            <h4>
                                {{ __('names.coupon') }}
                                @if ($discountCoupon->used)
                                <span class="text-danger">{{ __('names.used') }}</span>
                                @else
                                <span class="active" style="color: #00b21c;">{{ __('names.active') }}</span>
                                @endif
                            </h4>
                            <h3 class="tp-coupon-title">{{ __('names.discountCouponValue') }}</h3>

                            <div class="tp-coupon-date">
                                <span>{{ $discountCoupon->code }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="tp-coupon-item-right pl-20" style="width: 40%">
                        <div class="tp-coupon-status d-flex align-items-center">
                            <h1 class="tp-coupon-offer mb-0">
                                <span>{{ $discountCoupon->value }}%</span>
                                {{ __('names.off') }}
                            </h1>
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
</div>
@endsection

@push('css')
<style>
    .page-item {
        margin-left: 10px;
        margin-right: 10px;
    }

    .pagination .page-item .page-link {
        padding: 5px 10px;
    }

    .pagination .page-item.active .page-link {
        background-color: #175cff;
    }

    .pagination .page-item .page-link {
        &:hover {
            background-color: #175cff;

        }
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    .tp-sidebar-widget ul li a::after {
        position: absolute;
        content: "";
        width: 0;
        height: 0;
        background-color: transparent;
        border-radius: 50%;
        left: 0;
        top: 12px;
    }
</style>
@endpush