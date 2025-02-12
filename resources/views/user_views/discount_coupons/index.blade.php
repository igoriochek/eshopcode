@extends('layouts.app')

@section('title', __('menu.discountCoupons'))

@section('content')
<div class="shop_area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="margin-bottom: 25px;">{{ __('menu.discountCoupons') }}</h3>
                <div class="shop_toolbar_wrapper">
                    <div class="page_amount">
                        <p>
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
            </div>
            <div class="row">
                @forelse($discountCoupons as $discountCoupon)
                <div class="col-md-6 my-3">
                    <div class="coupon_container">
                        <div class="brand-init style1 blog-grid d-flex justify-content-between align-items-center">
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
                </div>
                @empty
                <span class="text-muted">{{ __('names.noDiscountCoupons') }}</span>
                @endforelse
            </div>


            <div class="col-lg-12">
                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        {{ $discountCoupons->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .coupon_container {
        font-style: italic;
        padding: 30px 45px;
        background: #f6f6f6;
        border: 1px solid #ebebeb;
        border-left: 4px solid #79a206;
    }
</style>
@endpush