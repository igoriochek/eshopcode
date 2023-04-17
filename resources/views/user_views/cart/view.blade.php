@extends('layouts.app')

@section('content')
    @include('page_header', [
        'secondPageLink' => 'viewcart',
        'secondPageName' => __('menu.cart'),
        'hasThirdPage' => false
    ])
    <div class="container py-5">
        <div class="container mb-80 mt-50 px-1">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    @if(count($cartItems)>0)
                    <h2 class="heading-2 mb-10">{{__('names.cart')}}</h2>
                </div>
                <!-- End col-lg-8 mb-40-->
            </div>
            <!-- End row -->
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7">
                    @include('flash::message')
                    @include('user_views.cart.table')
                    <div class="cart-action d-flex justify-content-between">
                        <a class="btn " href="{{ url('/') }}">
                            <i class="fas fa-arrow-left ms-2"></i>
                            {{ __('buttons.continueShopping') }}
                        </a>
                    </div>
                </div>
                <!-- End col-lg-8 -->
                <hr class="d-md-none my-4 opacity-0" />
                <div class="col-xxl-3 col-xl-4 col-lg-5 mt-lg-0 mt-md-5 mt-0">
                    <div class="border p-md-4 cart-totals ms-0 ms-lg-4">
                        <div>
                            <h5 class="fw-bold text-uppercase mb-4 text-center text-dark">{{ __('names.overview') }}</h5>
                            <div class="d-flex align-items-center justify-content-between mb-4" style="border: 2px solid white">
                                <h6 class="text-heading">{{__('names.total')}}</h6>
                                <h5 class="text-brand text-end">€{{ number_format($cart->sum, 2) }}</h5>
                            </div>
                        </div>
                        <a class="btn mr-20 w-100" href="{{route('checkout')}}">
                            {{ __('buttons.proceedToCheckout') }}
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <!-- End col-lg-4 -->
                @else
                    <div class="d-flex justify-content-center pt-50 flex-column gap-2">
                        <h6 class="text-body">{{__('names.noProductsInCart')}}</h6>
                        <span>
                            <a href="/user/products" class="card-link">{{__('names.browseProducts')}}</a>
                        </span>
                    </div>
                @endif
            </div>
            <!-- End row -->
        </div>
        <!-- End container mb-80 mt-50 -->
    </div>
    <!-- End container py-5 -->

@endsection

