@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.discountCoupons') ])

    <div class="container margin_60">
        <div class="row">
            @if(($discountCoupons->count()))
                <h4>{{__('names.discountCouponsForYou')}}</h4>
                @foreach($discountCoupons as $discount)
                    <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s"style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="row">
                                <div class="tour_list_desc d-flex flex-column justify-content-center p-4" style="height: 100px">
                                    <h3 class="card-title">
                                        <a href="{{route('viewproduct', $discount->id)}}">{{__('names.discountCouponCode')}} {{$discount->code}}</a>
                                    </h3>
                                    <h6 class="card-text">{{__('names.discountCouponValue')}} {{ number_format($discount->value,2)}} €</h6>
                                </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{__('names.noDiscountCoupons')}}
            @endif
        </div>
    </div>


@endsection
