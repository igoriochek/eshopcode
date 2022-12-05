@extends('layouts.app')

@section('content')
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ __('menu.discountCoupons') }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ __('menu.discountCoupons') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->
    <div class="shop__section section--padding">
        <div class="container">
            <div class="row">
                <div class="col-12 shop-col-width-lg-12">
                    <div class="shop__right--sidebar">
                        <div class="shop__product--wrapper">
                            <div class="shop__header d-flex align-items-center justify-content-between mb-30">
                                <div class="product__view--mode d-flex align-items-center">
                                    <div class="product__view--mode__list product__short--by align-items-center d-flex ">
                                        <h2 class="h2">{{ __('menu.discountCoupons') }}</h2>
                                    </div>
                                </div>
                                <p class="product__showing--count">
                                    {{ __('names.showing') }}
                                    @if (count($discountCoupons) > 0)
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
                                    @else
                                        {{ '0 '.__('names.entries') }}
                                    @endif
                                </p>
                            </div>
                            <div class="tab_content">
                                <ul class="widget__categories--menu">
                                    @forelse($discountCoupons as $coupon)
                                        <li class="widget__categories--menu__list p-3 my-4 d-flex flex-column">
                                            <span class="widget__categories--sub__menu--text">
                                                {{ __('names.discountCouponCode') }}: {{ $coupon->code }}
                                            </span>
                                            <span class="widget__categories--sub__menu--text product-count">
                                                {{ __('names.discountCouponValue') }}: €{{ number_format($coupon->value, 2) }}
                                            </span>
                                        </li>
                                    @empty
                                        <li>
                                            <span class="text-muted">{{ __('names.ndDiscountCoupons') }}</span>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="pagination__area">
                                <nav class="pagination justify-content-center">
                                    @if (!empty($discountCoupons->count()))
                                        {{ $discountCoupons->onEachSide(1)->links() }}
                                    @endif
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
