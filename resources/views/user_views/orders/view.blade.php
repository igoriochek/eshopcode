@extends('layouts.app')

@section('title', __('names.order').' '.$order->order_id)
@section('parentTitle', __('menu.orders'))
@section('parentUrl', url('/user/rootorders'))

@section('content')
<div class="my-account pb-5">
    <div class="container">
        <div class="row">
            <div class="mb-5">
                @include('adminlte-templates::common.errors')
                @include('flash_messages')
            </div>
            <div class="col-12">
                <h3 class="title">{{ __('names.yourAccount') }}</h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="{{ url('/user/userprofile') }}">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-user"></i>
                            </span>
                            <h4 class="sub-title">
                                {{ __('menu.profile') }}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="{{ url('/user/rootorders') }}">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-shopping-basket" style="color: #0b88ee;"></i>
                            </span>
                            <h4 class="sub-title" style="color: black;">
                                {{__('menu.orders')}}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="{{ url('/user/rootoreturns') }}">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-arrow-circle-left "></i>
                            </span>
                            <h4 class="sub-title">
                                {{ __('menu.returns') }}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12">
                <div class="log-out-btn text-center">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-dark3 my-5">{{ __('menu.logout') }}</a>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <hr class="my-4" />
                    <h3 class="contact-page-title">{{ __('names.order').':' }} {{ $order->order_id }}</h3>
                    <div class="row mb-4">
                        <div class="col-12 col-sm-6 d-flex flex-wrap align-items-center" style="column-gap: 10px; row-gap: 5px">
                            <div>{{ __('table.status').': '.__("status.".$order->status->name) }}</div>
                            <div>{{ __('table.sum').': €' }}{{ number_format($order->sum, 2) }}</div>
                            <div>{{ __('table.date').': '.$order->created_at->format('M d, Y') }}</div>
                        </div>
                        <div class="col-12 col-sm-6 d-flex justify-content-md-end justify-content-start align-items-center mt-3 mt-md-0">
                            @if ($order->status->name !== "Returned" && $order->status->name !== "Canceled")
                            @if ($order->status->name !== 'Completed')
                            <div class="btn-group">
                                <a href="{{ route('cancelnorder', [$order->id]) }}" class='btn btn-dark3'>
                                    {{__('names.cancelOrder')}}
                                </a>
                            </div>
                            @endif
                            @if ($order->status->name == 'Completed')
                            <div class="btn-group me-4">
                                <a href="{{ route('returnorder', [$order->id]) }}" class='btn btn-dark3'>
                                    {{__('names.returnOrder')}}
                                </a>
                            </div>
                            <div class="btn-group">
                                <a href="{{ route('download_invoice', [$order->id]) }}" class='btn btn-dark3'>
                                    {{__('names.invoice')}}
                                </a>
                            </div>
                            @endif
                            @else
                            <div class="btn-group">
                                <a href="{{ route('download_invoice', [$order->id]) }}" class='btn btn-dark3'>
                                    {{__('names.invoice')}}
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    @if ($order->status->name == 'Returned')
                                    <th scope="col" class="text-center th-col">{{ __('table.status') }}</th>
                                    @endif
                                    <th scope="col" class="text-center th-col">{{ __('table.productName') }}</th>
                                    <th scope="col" class="text-center th-col">{{ __('table.price') }}</th>
                                    <th scope="col" class="text-center th-col">{{ __('table.count') }}</th>
                                    <th scope="col" class="text-center th-col">{{ __('table.productComplex') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderItems as $item)
                                <tr>
                                    @if ($order->status->name == 'Returned')
                                    <td class="text-center">
                                        @if ($item->isReturned !== null)
                                        {{ __('status.Returned') }}
                                        @else
                                        &nbsp;
                                        @endif
                                    </td>
                                    @endif
                                    <td class="text-center">{{ $item->product->name }}</td>
                                    <td class="text-center">€{{ number_format($item->price_current, 2) }}</td>
                                    <td class="text-center">{{ $item->count }}</td>
                                    <td class="text-center">
                                        <div>
                                            @if($item->isComplexProduct == 1)
                                            <span>{{ __('table.yes') }}</span>
                                            @else
                                            <span>{{ __('table.no') }}</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="my-4" />
                    <h3 class="contact-page-title">{{ __('names.orderHistory') }}</h3>
                    @include('orders.history_table')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    a.axil-btn,
    button.axil-btn {
        padding: 14px 26px !important;
    }

    .view-btn {
        padding: 9px 20px;
        border: 1px solid var(--color-body);
        background-color: rgba(0, 0, 0, 0);
        color: var(--color-dark);
    }

    .view-btn:hover {
        background-color: var(--color-primary);
        border-color: var(--color-primary);
        color: var(--color-white);
    }

    .col-sm-left {
        flex: 0 0 auto;
        width: 45%;
    }

    .col-sm-right {
        flex: 0 0 auto;
        width: 55%;
    }

    .th-col {
        background-color: #0090f0 !important;
        border-color: transparent !important;
        color: #fff !important;
        text-transform: capitalize !important;
    }
</style>
@endpush