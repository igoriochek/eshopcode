@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'discountCoupons',
    'secondPageName' => __('names.discountCoupons'),
    'hasThirdPage' => false
])

    <div class="container py-10">
        @if(($discountCoupons->count()))
            @foreach($discountCoupons as $discount)
                <div class="row pt-5 ">
                    <a class="dashboard-course-item__link " href="{{route('viewproduct', $discount->id)}}">
                        <div class="dashboard-course-item__content">
                            <h3 class="dashboard-course-item__title">{{__('names.discountCouponCode')}} {{$discount->code}}</h3>
                            <div class="dashboard-course-item__meta">
                                <ul class="dashboard-course-item__meta-list">
                                    <li>
                                        <span class="meta-label">{{__('names.discountCouponValue')}} </span>
                                        <span class="meta-value">{{ number_format($discount->value,2)}} €</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            {{__('names.noDiscountCoupons')}}
        @endif
    </div>

@endsection
