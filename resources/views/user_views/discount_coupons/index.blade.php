@extends('layouts.app')

@section('title', __('menu.discountCoupons'))

@section('content')
    <div class="blog-area ptb-70">
        <div class="container">
            <div class="team-area pt-70 pb-45">
                <div class="container">
                    <div class="shop-top-shorting-area">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="shop-shorting-left-content">
                                    <ul>
                                        <li>
                                            <h4 class="mb-1">{{ __('menu.discountCoupons') }}</h4>
                                            <p>
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
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="shop-shorting-right-content">
                                    <ul>
                                        <li>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @forelse($discountCoupons as $discountCoupon)
                            <div class="col-lg-4 col-sm-6">
                                <div class="single-team-card">
                                    <div class="content">
                                        <h3>{{ __('names.discountCouponCode')}}: {{ $discountCoupon->code }}</h3>
                                        <span>{{ __('names.discountCouponValue')}}: €{{ number_format($discountCoupon->value, 2)}}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <span class="text-muted">{{ __('names.noDiscountCoupons') }}</span>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="default-pagination mt-20">
                @if (count($discountCoupons) > 0)
                    {{ $discountCoupons->onEachSide(1)->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
