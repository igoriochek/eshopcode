@extends('layouts.app')

@section('title', __('menu.cart'))

@section('content')
<section class="whish-list-section pb-6rem">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title text-capitalize">{{ __('menu.cart') }}</h3>
                <div class="table-responsive pt-4">
                    @include('user_views.cart.table')
                </div>
                <div class="cart-update-btn-area mb-4">
                    <div class="update-btn d-flex">
                        <a href="{{ route('userproducts') }}" class="btn btn-dark3">
                            {{ __('buttons.continueShopping') }}
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                        <div class="axil-order-summery mt--80">
                            <h5 class="title mb--20">{{ __('names.overview') }}</h5>
                            <div class="table-responsive">
                                <table class="table mb--30">
                                    <tbody class="thead-light">
                                        <tr class="order-total">
                                            <td>{{ __('names.total') }}</td>
                                            <td class="order-total-amount">
                                                €{{ $cart->sum ? number_format($cart->sum, 2) : '0.00' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if (count($cartItems) > 0)
                            <a href="{{ url('user/checkout') }}" class="btn btn-primary btn-block rounded">
                                {{ __('buttons.proceedToCheckout') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection