@extends('layouts.app')

@section('title', __('names.preview'))
@section('parentTitle', __('names.checkout'))
@section('parentUrl', url('/user/checkout'))

@section('content')
<section class="section-checkout padding-tb-50">
    <div class="container">
        <div class="row mb-minus-24 justify-content-center">
            <div class="col-lg-8 col-12 mb-24">
                <div class="bb-checkout-sidebar">
                    <div class="checkout-items" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="sub-title">
                            <h4>{{ __('names.summary') }}</h4>
                        </div>
                        <div class="checkout-summary">
                            <ul>
                                <li><span class="left-item">{{ __('names.total') }}</span><span>€{{ number_format($amount, 2) }}</span></li>
                                @foreach ($discounts as $discount)
                                <li>
                                    <span class="left-item">{{ __('names.couponDiscount') }}</span>
                                    <span>€ -{{ number_format($discount->value, 2) }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="bb-checkout-pro">
                            @foreach ($cartItems as $item)
                            <div class="pro-items">
                                <div class="image">
                                    @if ($item['product']->image)
                                    <img src="{{ $item['product']->image }}"
                                        alt="{{ $item['product']->name }}">
                                    @else
                                    <img src="{{ asset('template/img/new-product/1.jpg') }}"
                                        alt="{{ $item['product']->name }}">
                                    @endif
                                </div>
                                <div class="items-contact">
                                    <h4><a href="{{ route('viewproduct', $item['product']->id) }}">{{ $item['product']->name }}</a></h4>
                                    <span class="bb-pro-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="
                                            @if ($item['product']->average >= $i) ri-star-fill
                                            @elseif ($item['product']->average >= $i - 0.5) ri-star-half-fill
                                            @else ri-star-line @endif"
                                            style="
                                            @if ($item['product']->average >= $i - 0.5) color: #fea99a; @endif"></i>
                                            @endfor
                                    </span>
                                    <div class="inner-price">
                                        @if ($item['product']->discount)
                                        <span class="new-price">€{{ $item['product']->price - round(($item['product']->price * $item['product']->discount->proc) / 100, 2) }}</span>
                                        <span class="old-price">€{{ number_format($item['product']->price, 2) }}</span>
                                        @else
                                        <span class="new-price">€{{ number_format($item['product']->price, 2) }}</span>
                                        @endif
                                    </div>
                                    <div class="bb-pro-variation">
                                        <ul>
                                            @forelse ($item['product']->categories as $category)
                                            <li>
                                                <a href="{{ url("/innercategories/$category->id") }}">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                            @empty
                                            <span class="text-muted">{{ __('names.noCategories') }}</span>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="sku">
                                        <h5>{{ 'x' . $item->count }}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="checkout-items" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <div class="sub-title">
                            <h4>{{ __('names.paymentMethods') }}</h4>
                        </div>
                        <div class="payment-img d-flex justify-content-center">
                            <img src="{{ asset('images/1_Paysera logo for light background.svg') }}" style="width: 100px !important;" alt="payment">
                        </div>
                    </div>
                    {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                    <div class="input-button d-flex justify-content-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                        <button type="submit" type="button" class="bb-btn-2">{{ __('buttons.placeOrder') }}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    .pro-items {
        display: flex;
        align-items: center;
    }

    .pro-items .d-flex.align-items-center {
        margin-left: auto;
    }
</style>