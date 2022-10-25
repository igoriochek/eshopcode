@extends('layouts.app')

@section('content')
    @include('page_header', [
        'secondPageLink' => 'discountCoupons',
        'secondPageName' => __('menu.discountCoupons'),
        'hasThirdPage' => false
    ])
    <div class="container">
        <div class="row my-4 py-1">
            <h4 class="mb-2">{{ __('names.discountCoupons') }}</h4>
            <p>
                {{ __('names.showing') }}
                @if (!empty($discountCoupons->count()))
                    @if ($discountCoupons->currentPage() !== $discountCoupons->lastPage())
                        {{ ($discountCoupons->count() * $discountCoupons->currentPage() - $discountCoupons->count() + 1).__('–').($discountCoupons->count() * $discountCoupons->currentPage())}}
                    @else
                        @if ($discountCoupons->total() - $discountCoupons->count() === 0)
                            {{ $discountCoupons->count() }}
                        @else
                            {{ ($discountCoupons->total() - $discountCoupons->count()).__('–').$discountCoupons->total() }}
                        @endif
                    @endif
                    {{ __('names.of') }}
                    {{ $discountCoupons->total().' '.__('names.resultsOf') }}
                @else
                    {{ '0 '.__('names.of') }}
                    {{ '0 '.__('names.resultsOf') }}
                @endif
            </p>
        </div>
        <div class="row">
            {{--<h3 style="font-family: 'Times New Roman', sans-serif">{{__('names.discountCoupons')}}</h3>--}}
            <div class="col-lg-12">
                <div class="row">
                    @forelse( $discountCoupons as $prod )
                        <div class="col-lg-6 col-md-12">
                            <div class="bg-white p-4 mb-4 d-flex flex-column gap-2" style="border: 1px solid #ececec; border-radius: 15px;-webkit-box-shadow: 5px 5px 15px rgb(0 0 0 / 5%);box-shadow: 5px 5px 15px rgb(0 0 0 / 5%);">
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
