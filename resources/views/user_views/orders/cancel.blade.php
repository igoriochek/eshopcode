@extends('layouts.app')

@section('content')

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{__("names.cancelOrder")}} {{ $order->id }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/user/rootorders') }}">{{__('menu.orders')}}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ route('vieworder', [$order->id]) }}">{{__('names.order')}} {{ $order->order_id }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{__("names.cancelOrder")}} {{ $order->id }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <section class="my__account--section section--padding">
        <div class="container">
            @include('flash::message')
            <div class="my__account--section__inner border-radius-10 d-flex justify-content-center">
                <div class="account__wrapper">
                    <div class="account__content ">
                        {!! Form::model($order, ['route' => ['savecancelnorder', $order->id], 'method' => 'post', 'class' => 'py-2']) !!}
                        <div class="col-sm-12">
                            <label class="checkout__input--label mb-2">{{__('names.desc')}} <span
                                    class="checkout__input--label__star">*</span></label>
                            {!! Form::textarea('description', null, ['class' => 'reviews__comment--reply__textarea']) !!}
                        </div>
                        <div
                            class="form-group col-sm-12 d-flex flex-column flex-md-row justify-content-md-center align-items-sm-center gap-3 my-4">
                            {!! Form::submit(__('buttons.save'), ['class' => 'primary__btn']) !!}
                            <a href="{{ route('rootorders') }}" class="primary__btn text-center">
                                {{__('buttons.cancel')}}
                            </a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

