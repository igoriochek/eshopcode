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
            @if($cartItems)
                @include('user_views.cart.table')
                <div class="row justify-content-end">
                    <div class="column col-lg-4 col-md-6">
                        <a href="{{route('checkout')}}" class="btn_full">{{__('buttons.checkout')}}<i class="icon-left"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endif
        </div>
    </section>

@endsection

