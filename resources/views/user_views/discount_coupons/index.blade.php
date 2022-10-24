@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex align-items-center gap-2 mb-4">
                <h4 class="m-0 p-0">{{ __('names.discountCoupons') }}</h4>
                <span class="text-muted fs-6">({{ $discountCoupons->total().' '.__('names.discountCoupons') }})</span>
            </div>
        </div>
        <div class="row">
            {{--<h3 style="font-family: 'Times New Roman', sans-serif">{{__('names.discountCoupons')}}</h3>--}}
            <div class="col-lg-12 mt-3">
                <div class="row">
                    @forelse( $discountCoupons as $prod )
                        <div class="col-lg-6 col-md-12">
                            <div class="p-4 mb-4" style="background: #f1f1f1; border-radius: 5px">
                                <h5>{{__('names.discountCouponCode')}}: {{$prod->code}}</h5>
                                <h6>{{__('names.discountCouponValue')}}: {{number_format($prod->value,2)}} EU</h6>
                            </div>
                        </div>
                    @empty
                        <span class="text-muted">{{ __('names.noDiscountCoupons') }}</span>
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
