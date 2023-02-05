@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h5 class="text-uppercase">{{__('names.discountCoupons')}}</h5>
            <div class="col-lg-12 mt-3">
                <div class="row">
                    @forelse( $discountCoupons as $prod )
                        <div class="col-lg-6 col-md-12">
                            <div class="my-3 mb-4 p-4" style="border-left: 7.5px solid #0e9f6e">
                                <h5>{{__('names.discountCouponCode')}}: {{$prod->code}}</h5>
                                <h6>{{__('names.discountCouponValue')}}: {{number_format($prod->value,2)}} EU</h6>
                            </div>
                        </div>
                    @empty
                        <span class="text-muted">{{ __('names.ndDiscountCoupons') }}</span>
                    @endforelse
                </div>
                <div class="d-flex justify-content-center mt-4">
                    @if (!empty($discountCoupons->count()))
                        {{ $discountCoupons->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
