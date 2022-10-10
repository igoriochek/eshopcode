@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    @if(count($cartItems)>0)
                    <h1 class="heading-2 mb-10">{{__('names.cart')}}</h1>
                </div>
                <!-- End Col-Lg-8 Mb-40-->
            </div>
            <!-- End Row -->
            <div class="row">
                <div class="col-lg-8">
                    @include('flash::message')
                    @include('user_views.cart.table')
                    <div class="divider-2 mb-30"></div>
                    <div class="cart-action d-flex justify-content-between">
                        <a class="btn " href="{{ url('/user/products') }}"><i class="fi-rs-arrow-left mr-10"></i>{{__('buttons.continueShopping')}}</a>
                    </div>
                </div>
                <!-- End Col-Lg-8 -->
                <div class="col-lg-4">
                    <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <h5 class="fw-bold text-muted text-uppercase mb-3 text-center">{{ __('names.overview') }}</h5>
                            <table class="table no-border">
                                <tbody>
                                <tr class="total">
                                    <td>
                                        <h6 class="text-muted">{{__('names.total')}}</h6>
                                    </td>
                                    <td class="text-end">
                                        <h5 class="text-brand text-end">{{number_format($cart->sum,2) }} €</h5>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn  mr-20 w-100" href="{{route('checkout')}}" >{{__('buttons.proceedToCheckout')}}<i class="fi-rs-sign-out ml-15"></i></a>
                    </div>
                </div>
                <!-- End Col-lg-4 -->
                @else
                    <div>
                        <h6 class="text-body">{{__('names.noProductsInCart')}}</h6>
                        <span>
                                <a href="/user/products" class="card-link">{{__('names.browseProducts')}}</a>
                            </span>
                    </div>
                @endif
            </div>
            <!-- End Row -->
        </div>
        <!-- End container mb-80 -->
    </div>
    <!-- End container py-5 -->

@endsection

