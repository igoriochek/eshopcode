@extends('layouts.app')

@section('content')
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ __('menu.orders') }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ __('menu.orders') }}</span>
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
                        <h2 class="account__content--title h3 mb-20">{{__('names.orders')}}</h2>
                        <div class="account__table--area">
                            <table class="account__table">
                                <thead class="account__table--header">
                                <tr class="account__table--header__child">
                                    <th class="account__table--header__child--items">{{__('names.order')}} ID</th>
                                    <th class="account__table--header__child--items">{{__('table.date')}}</th>
                                    <th class="account__table--header__child--items">{{__('table.status')}}</th>
                                    <th class="account__table--header__child--items">{{__('table.sum')}}</th>
                                    <th class="account__table--header__child--items d-flex justify-content-center">{{__('table.action')}}</th>
                                </tr>
                                </thead>
                                <tbody class="account__table--body mobile__none">
                                @forelse($orders as $item)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">{{ $item->id }}</td>
                                        <td class="account__table--body__child--items">{{ $item->created_at->format('Y-m-d H:m') }}</td>
                                        <td class="account__table--body__child--items">{{ __("status." . $item->status->name) }}</td>
                                        <td class="account__table--body__child--items">{{ number_format($item->sum,2) }} €</td>
                                        <td class="account__table--body__child--items w-5 d-flex justify-content-center">
                                                <a href="{{ route('vieworder', [$item->id]) }}">
                                                    <i class="far fa-eye me-1" title="{{ __('buttons.details') }}"></i>
                                                </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="ps-3">>{{__('names.noOrders')}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tbody class="account__table--body mobile__block">
                                @forelse($orders as $item)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">
                                            <strong>{{__('names.order')}} ID</strong>
                                            <span>{{ $item->id }}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>{{__('table.date')}}</strong>
                                            <span>{{ $item->created_at->format('Y-m-d H:m') }}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>{{__('table.status')}}</strong>
                                            <span>{{ __('status.' . $item->status->name) }}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>{{__('table.sum')}}</strong>
                                            <span>{{ number_format($item->sum,2) }} €</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>{{__('table.action')}}</strong>
                                            <span><a href="{{ route('vieworder', [$item->id]) }}">
                                                    <i class="far fa-eye me-1" title="{{ __('buttons.details') }}"></i>
                                                </a></span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="ps-3">>{{__('names.noOrders')}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

