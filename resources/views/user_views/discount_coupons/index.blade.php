@extends('layouts.app')

@section('title', __('menu.discountCoupons'))

@section('content')
<section class="section-terms padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="200">
                    <div class="section-detail">
                        <h2 class="bb-title">{{ __('menu.discountCoupons') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($discountCoupons as $discountCoupon)
                <div class="col-md-6 my-3">
                    <div class="desc" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
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
            <div class="col-12">
                <div class="bb-pro-pagination">
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
                    <div class="bb-pro-pagination">
                        {{ $discountCoupons->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css')
<style>
    .pagination .page-item.active .page-link {
        background-color: #3d4750 !important;
        color: #fff !important;
        transition: all 0.3s ease-in-out !important;
        width: 32px !important;
        height: 32px !important;
        padding: 0 !important;
        font-weight: 300 !important;
        line-height: 32px !important;
        font-size: 15px !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        text-align: center !important;
        vertical-align: top !important;
        -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        border-radius: 10px !important;
        border: 1px solid #eee !important;
    }

    .pagination .page-item .page-link {

        background: #f8f8fb;
        transition: all 0.3s ease-in-out !important;
        width: 32px !important;
        height: 32px !important;
        padding: 0 !important;
        font-weight: 300 !important;
        line-height: 32px !important;
        font-size: 15px !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        text-align: center !important;
        vertical-align: top !important;
        -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        border-radius: 10px !important;
        border: 1px solid #eee !important;

        &:hover {
            background-color: #3d4750 !important;
            color: #fff !important;
        }
    }
</style>
@endpush