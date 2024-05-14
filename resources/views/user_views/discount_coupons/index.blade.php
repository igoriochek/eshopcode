@extends('layouts.app')

@section('title', __('menu.discountCoupons'))

@section('content')
    <div class="axil-single-product-area axil-section-gap bg-color-white pb--120">
        <div class="container">
            <div class="row gap-5 gap-lg-0">
                <div class="col-12">
                    <div class="axil-shop-top mb--40">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="shop-shorting-left-content">
                                    <h4 class="mb-1">{{ __('menu.discountCoupons') }}</h4>
                                    <p class="filter-results">
                                        @if (count($discountCoupons) > 0)
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
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="shop-shorting-right-content">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-5">
                        @forelse($discountCoupons as $discountCoupon)
                            <div class="col-md-6">
                                <div class="content-blog blog-grid d-flex justify-content-between align-items-center">
                                    <div class="inner">
                                        <h5 class="mb-1">{{ __('names.discountCouponCode') }}: {{ $discountCoupon->code }}
                                        </h5>
                                        <span class="filter-results">{{ __('names.discountCouponValue') }}:
                                            €{{ number_format($discountCoupon->value, 2) }}</span>
                                    </div>
                                    @if ($discountCoupon->used)
                                        <div>
                                            <div class="border border-danger d-flex align-items-center justify-content-center px-4 py-3 text-danger fw-bold"
                                                style="border-radius: 6px">
                                                {{ __('names.used') }}
                                            </div>
                                        </div>
                                    @else
                                        <div>
                                            <div class="border border-success d-flex align-items-center justify-content-center px-4 py-3 text-success fw-bold"
                                                style="border-radius: 6px">
                                                {{ __('names.active') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <span class="text-muted">{{ __('names.noDiscountCoupons') }}</span>
                        @endforelse
                    </div>
                    @if (count($discountCoupons) > 10)
                        <div class="text-center pt--20">
                            {{ $discountCoupons->onEachSide(1)->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .filter-results {
            margin-left: 0px;
        }
    </style>
@endpush
