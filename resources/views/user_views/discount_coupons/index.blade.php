@extends('layouts.app')

@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <h1>{{__('names.discountCoupons')}}</h1>
                            @if(!empty($discountCoupons))
                                <p>
                                    {{ __('names.results').': '.$discountCoupons->count() }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <hr class="hr"/>
                    <div class="row">
                        @if(($discountCoupons->count()))
                            @foreach($discountCoupons as $discountCoupon)
                                <div class="discount-coupon p-4 mb-4 mb-sm-5">
                                    <h4>
                                        <a class="discount-coupon-title"
                                           href="{{ route('viewproduct', $discountCoupon->id) }}">
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
                        @if (!empty($discountCoupons->count()))
                            <div class="pagination-area mt-20 mb-20">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-start">
                                        {{ $discountCoupons->links() }}
                                    </ul>
                                </nav>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
