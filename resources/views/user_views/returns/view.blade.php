@extends('layouts.app')

@section('content')

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{__('names.return')}} {{ $return->id }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/user/rootoreturns') }}">{{__('menu.returns')}}
                                </a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{__('names.return')}} {{ $return->id }}</span>
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
                                <h2 class="account__content--title h3">{{__('names.return')}} {{ $return->id }}</h2>
                                <span class="text-muted">
                                        {{__('names.returnStatus')}}: {{ __("status." . $return->status->name) }}
                                </span>
                            </div>
                        </div>
                        <div class="account__table--area mb-40">
                            <h3 class="account__content--title h3 mb-10">{{ __('names.products') }}</h3>
                            <table class="account__table">
                                <thead class="account__table--header">
                                <tr class="account__table--header__child">
                                    <th class="account__table--header__child--items">{{__('table.productName')}}</th>
                                    <th class="account__table--header__child--items">{{__('table.price')}}</th>
                                    <th class="account__table--header__child--items">{{__('table.count')}}</th>
                                </tr>
                                </thead>
                                <tbody class="account__table--body mobile__none">
                                @foreach($returnItems as $item)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">{{ $item->product->name }}</td>
                                        <td class="account__table--body__child--items">{{ number_format($item->price_current,2) }}
                                            €
                                        </td>
                                        <td class="account__table--body__child--items">{{ $item->count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tbody class="account__table--body mobile__block">
                                @foreach($returnItems as $item)
                                    <tr class="account__table--body__child">
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
                        <h3 class="account__content--title h3 mb-10">{{ __('names.orderHistory') }}</h3>
                        @include('orders.history_table')
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

