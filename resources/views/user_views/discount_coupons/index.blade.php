@extends('layouts.app')

@section('title', __('menu.discountCoupons'))

@section('content')
    <div class="blog-area ptb-70">
        <div class="container">
            <div class="team-area pt-70 pb-45">
                <div class="container">
                    <div class="row justify-content-center">
                        @forelse($discountCoupons as $discountCoupon)
                            @if (!$discountCoupon->used)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-team-card">
                                        <div class="content">
                                            <h3>{{ __('names.discountCouponCode')}}: {{ $discountCoupon->code }}</h3>
                                            <span>{{ __('names.discountCouponValue')}}: €{{ number_format($discountCoupon->value, 2)}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <span class="text-muted">{{ __('names.ndDiscountCoupons') }}</span>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="default-pagination mt-20">
                @if (!empty($discountCoupons->count()))
                    {{ $discountCoupons->onEachSide(1)->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
