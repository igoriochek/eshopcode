@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <section class="content-header">
                <div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{__('names.discountCoupons')}}</h1>
                        </div>
                    </div>
                </div>
            </section>


{{--            <div class="col-sm-6">--}}
{{--                <h3>[{{__('names.discountCouponsForYou')}}]</h3>--}}
{{--                --}}{{--        <a href="{{route("rootcategories")}}">Back to main categories</a>--}}
{{--            </div>--}}
            <div class="content px-3">

                {{--        @include('flash::message')--}}

                <div class="clearfix"></div>

                <div class="card">
                    <div class="card-body p-3">
                        {{--                @include('products.table')--}}

                        @if(($discountCoupons->count()))
                            @foreach( $discountCoupons as $prod )
                                <div class="card-body">
                                    <h4 class="card-title">{{__('names.discountCouponCode')}}: {{$prod->code}}</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">{{__('names.discountCouponValue')}}: {{number_format($prod->value,2)}} EU</h6>
                                </div>
                            @endforeach

                        @else
                            {{__('names.ndDiscountCoupons')}}
                        @endif




                        <div class="float-right">
                            @if (!empty($discountCoupons->count()))
                                {{ $discountCoupons->links() }}
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
