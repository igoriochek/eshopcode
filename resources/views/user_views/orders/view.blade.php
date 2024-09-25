@extends('layouts.app')

@section('title', __('names.order').' '.$order->order_id)
@section('parentTitle', __('menu.orders'))
@section('parentUrl', url('/user/rootorders'))

@section('content')
<div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="mb-5">
                        @include('adminlte-templates::common.errors')
                        @include('flash_messages')
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link" href="{{ url('/user/userprofile') }}" aria-selected="false"><i class="fas fa-user"></i>{{ __('menu.profile') }}</a>
                                        <a class="nav-item nav-link active" href="{{ url('/user/rootorders') }}" aria-selected="false"><i class="fas fa-shopping-basket"></i>{{__('menu.orders')}}</a>
                                        <a class="nav-item nav-link" href="{{ url('/user/rootoreturns') }}" aria-selected="false"><i class="fas fa-arrow-circle-left "></i>{{ __('menu.returns') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="nav-item nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fal fa-sign-out"></i>{{ __('menu.logout') }}
                                        </a>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-orders" role="tabpanel">
                                <div class="your-orders">
                                    <h3 class="mb-2">{{ __('names.order').':' }} {{ $order->order_id }}</h3>
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
                                                        <a href="{{ route('cancelnorder', [$order->id]) }}" class='axil-btn view-btn'>
                                                            {{__('names.cancelOrder')}}
                                                        </a>
                                                    </div>
                                                @endif
                                                @if ($order->status->name == 'Completed')
                                                    <div class="btn-group me-4">
                                                        <a href="{{ route('returnorder', [$order->id]) }}" class='axil-btn view-btn'>
                                                            {{__('names.returnOrder')}}
                                                        </a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a href="{{ route('download_invoice', [$order->id]) }}" class='axil-btn view-btn'>
                                                            {{__('names.invoice')}}
                                                        </a>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="btn-group">
                                                    <a href="{{ route('download_invoice', [$order->id]) }}" class='axil-btn view-btn'>
                                                        {{__('names.invoice')}}
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        @if ($order->status->name == 'Returned')
                                                            <th scope="col">{{ __('table.status') }}</th>
                                                        @endif
                                                        <th scope="col">{{ __('table.productName') }}</th>
                                                        <th scope="col">{{ __('table.price') }}</th>
                                                        <th scope="col">{{ __('table.count') }}</th>
                                                        <th scope="col">{{ __('table.productComplex') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orderItems as $item)
                                                        <tr>
                                                            @if ($order->status->name == 'Returned')
                                                                <td>
                                                                    @if ($item->isReturned !== null)
                                                                        {{ __('status.Returned') }}
                                                                    @else
                                                                        &nbsp;
                                                                    @endif
                                                                </td>
                                                            @endif
                                                            <td>{{ $item->product->name }}</td>
                                                            <td>€{{ number_format($item->price_current, 2) }}</td>
                                                            <td>{{ $item->count }}</td>
                                                            <td>
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
                                    </div>
                                    <hr class="mt-5 mb-5" />
                                    <h3>{{ __('names.orderHistory') }}</h3>
                                    @include('orders.history_table')
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('css')
    <style>
        a.axil-btn, button.axil-btn {
            padding: 14px 26px !important;
        }
        .view-btn {
            padding: 9px 20px;
            border: 1px solid var(--color-body);
            background-color: rgba(0,0,0,0);
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
    </style>
@endpush


