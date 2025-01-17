@extends('layouts.app')

@section('title', __('menu.cart'))

@section('content')
<section class="section-cart padding-tb-50">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="col-lg-4 mb-24">
                <div class="bb-cart-sidebar-block" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="bb-sb-title">
                        <h3>{{ __('names.overview') }}</h3>
                    </div>
                    <div class="bb-sb-blok-contact">
                        <div class="bb-cart-summary">
                            <div class="summary-total">
                                <ul>
                                    <li><span class="text-left">{{ __('names.total') }}</span><span class="text-right">€{{ $cart->sum ? number_format($cart->sum, 2) : '0.00' }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-24">
                <div class="bb-cart-table mb-3" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    @include('user_views.cart.table')
                </div>
                @if (count($cartItems) > 0)
                <div class="d-flex" style="justify-content: space-between;" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <a href="{{ url('user/checkout') }}" class="bb-btn-2 check-btn">
                        {{ __('buttons.proceedToCheckout') }}
                    </a>
                    <a href="{{ route('userproducts') }}" class="bb-btn-1 check-btn">
                        {{ __('buttons.continueShopping') }}
                    </a>
                </div>
                @else
                <div class="d-flex" style="justify-content: flex-end;" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <a href="{{ route('userproducts') }}" class="bb-btn-1 check-btn">
                        {{ __('buttons.continueShopping') }}
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection