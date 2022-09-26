@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.discountCoupons') ])

    <div id="position">
        <div class="container">
            <ul>
                <li>
                    <a href="../">{{__('menu.home')}}</a>
                </li>
                <li>
                    {{ __('names.discountCoupons') }}
                </li>
            </ul>
        </div>
    </div>

    <div class="container margin_60">
        <div class="row">
            @if(($discountCoupons->count()))
                <h4>{{__('names.discountCouponsForYou')}}</h4>
                @foreach($discountCoupons as $discount)
                    <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s"style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="row">
                                <div class="tour_list_desc d-flex flex-column justify-content-center p-4">
                                    <h3 class="card-title">
                                        <a href="{{route('viewproduct', $discount->id)}}">{{__('names.discountCouponCode')}} {{$discount->code}}</a>
                                    </h3>
                                    <h6 class="card-text">{{__('names.discountCouponValue')}} {{$discount->value}}€</h6>
                                    <p class="card-subtitle mb-2 text-muted">{{__('names.desc')}}</p>
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
