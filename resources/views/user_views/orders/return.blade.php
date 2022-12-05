@extends('layouts.app')

@section('content')

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ __('names.return') }} {{__('names.order')}} {{ __($order->id) }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url("/{$role}/rootorders") }}">{{__('menu.orders')}}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ route('vieworder', [$role, $order->id]) }}">{{__('names.order')}} {{ $order->order_id }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ __('names.return') }} {{__('names.order')}} {{ __($order->id) }}</span>
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
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between mb-30">
                            <div class="mb-2 mb-md-0">
                                <h2 class="account__content--title h3">{{__("names.return")}} {{ $order->id }}</h2>
                            </div>
                        </div>
                        {!! Form::model($order, ['route' => ['savereturnorder', [$role, $order->id]], 'method' => 'post']) !!}
                        <div class="account__table--area mb-40">
                            <h3 class="account__content--title h3 mb-10">{{ __('names.products') }}</h3>
                            <table class="account__table">
                                <thead class="account__table--header">
                                    <tr class="account__table--header__child">
                                        <th class="account__table--header__child--items text-center">{{__('names.checkReturn')}}</th>
                                        <th class="account__table--header__child--items">{{__('table.productId')}}</th>
                                        <th class="account__table--header__child--items">{{__('table.productName')}}</th>
                                        <th class="account__table--header__child--items">{{__('table.price')}}</th>
                                        <th class="account__table--header__child--items">{{__('table.count')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="account__table--body mobile__none">
                                @foreach($orderItems as $item)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items text-center">{!! Form::checkbox("return_items[]", $item->product_id, false) !!}</td>
                                        <td class="account__table--body__child--items">{{ $item->product_id }}</td>
                                        <td class="account__table--body__child--items">{{ $item->product->name }}</td>
                                        <td class="account__table--body__child--items">{{ number_format($item->price_current,2) }} €</td>
                                        <td class="account__table--body__child--items">{{ $item->count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tbody class="account__table--body mobile__block">
                                @foreach($orderItems as $item)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">
                                            <strong>{{__('names.checkReturn')}}</strong>
                                            <span>{!! Form::checkbox("return_items[]", $item->product_id, false) !!}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>{{__('table.productId')}}</strong>
                                            <span>{{ $item->product_id }}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>{{__('table.productName')}}</strong>
                                            <span>{{ $item->product->name }}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>{{__('table.price')}}</strong>
                                            <span>{{ number_format($item->price_current,2) }} €</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>{{__('table.count')}}</strong>
                                            <span>{{ $item->count }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12">
                            <label class="checkout__input--label mb-2">{{__('names.desc')}} <span class="checkout__input--label__star">*</span></label>
                            {!! Form::textarea('description', null, ['class' => 'reviews__comment--reply__textarea']) !!}
                        </div>
                        <div class="form-group col-sm-12 d-flex flex-column flex-md-row justify-content-md-center align-items-sm-center gap-3 my-4">
                            {!! Form::submit(__('buttons.save'), ['class' => 'primary__btn']) !!}
                            <a href="{{ route('rootorders', $role) }}" class="primary__btn text-center">
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

