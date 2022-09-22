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

