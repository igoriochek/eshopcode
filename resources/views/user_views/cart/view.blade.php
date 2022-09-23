@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.cart') ])

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="../">{{__('menu.home')}}</a></li>
                <li>{{ __('names.cart') }}</li>
            </ul>
        </div>
    </div>

    <section>
        <div class="container margin_60">
            @include('flash::message')
            <div class="clearfix"></div>
            @if(count($cartItems)>0)
                @include('user_views.cart.table')
            @else
                <div class="cart-section">
                    <h3 class="card-text">{{__('names.noProductsInCart')}}</h3>
                    <span>
                    <a href="/user/products" class="card-link">{{__('names.browseProducts')}}</a>
                </span>
                </div>
            @endif
        </div>
    </section>

@endsection

