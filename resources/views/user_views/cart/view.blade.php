@extends('layouts.app')

@section('content')

    <section id="hero" class="background-image" data-background=url(../img/header_bg.jpg) style="height: 470px">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="intro_title">
                <h3 class="animated fadeInDown">{{ __('names.cart') }}</h3>
            </div>
        </div>
    </section>

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
                <table class="table table-striped cart-list shopping-cart">
                    <thead>
                    <tr>
                        <th>{{__('table.name')}}</th>
                        <th>{{__('table.count')}}</th>
                        <th>{{__('table.price')}}</th>
                        <th>{{__('table.subTotal')}}</th>
                        <th>{{__('names.removeProduct')}}</th>
                    </tr>
                    </thead>
                </table>
                    <h2>{{ __('names.emptyCart') }}</h2>
                </div>
            @endif
        </div>
    </section>

@endsection

