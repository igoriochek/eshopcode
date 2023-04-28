@extends('layouts.app')

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow">
                    <i class="fi-rs-home mr-5"></i>
                    {{ __('menu.home') }}
                </a>
                <span></span>
                <a href="{{ url("/user/rootorders") }}">
                    {{ __('menu.orders') }}
                </a>
                <span></span>
                <a href="{{ url("/user/vieworder/$order->id") }}">
                    {{ $order->id ?? '-' }}
                </a>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="col-lg-12 m-auto px-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="w-100">
                        @include('flash::message')
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center gap-3 mb-40">
                <div class="d-flex flex-column gap-2">
                    <h3 class="mb-3">{{__('names.order')}}: {{ $order->order_id }}</h3>
                    <div class="d-flex flex-column gap-3 fs-6">
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex gap-2">
                                {{ __('table.collectTime') }}:
                                <strong>{{ $order->collect_time }}</strong>
                            </div>
                            <div class="d-flex gap-2">
                                {{ __('names.eatLocation') }}:
                                <strong>
                                    @if ($order->place == \App\Models\Order::ONTHESPOT)
                                        {{ __('names.onTheSpot') }}
                                    @else
                                        {{ __('names.takeaway') }}
                                    @endif
                                </strong>
                            </div>
                            <div class="d-flex gap-2">
                                {{ __('names.companyBuy') }}:
                                <strong>
                                    @if ($order->isCompanyBuying)
                                        {{ __('names.yes') }}
                                    @else
                                        {{ __('names.no') }}
                                    @endif
                                </strong>
                            </div>
                        </div>
                        <div style="height: 2px; background: lightgray; width: 50px"></div>
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex gap-2">
                                {{ __('names.orderStatus')}}:
                                <strong>{{ __("status." . $order->status->name) }}</strong>
                            </div>
                            <div class="d-flex gap-2">
                                {{ __('names.total') }}:
                                <strong>€{{ number_format($order->sum, 2) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3 mb-lg-0 mt-4 mt-lg-0">
                    @if($order->status->name !== "Returned" && $order->status->name !== "Canceled")
                        <div class="btn-group mr-10" style="float: right">
                            <a href="{{ route('cancelnorder', [$order->id]) }}" class="view-order-button col-12 text-center">
                                <i class="far fa-trash-alt me-1"></i>
                                {{__('names.cancelOrder')}}
                            </a>
                        </div>
                        <div class="btn-group mr-10" style="float: right">
                            <a href="{{ route('returnorder', [$order->id]) }}" class="view-order-button col-12 text-center">
                                <i class="far fa-arrow-alt-circle-right me-1"></i>
                                {{__('names.return')}}
                            </a>
                        </div>
                        @if($order->status->name == 'Completed')
                            <div class="btn-group mr-10" style="float: right">
                                <a href="{{ route('download_invoice', [$order->id]) }}" class="view-order-button col-12 text-center">
                                    <i class="fa-solid fa-file-invoice me-1"></i>
                                    {{__('names.invoice')}}
                                </a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            <div class="col-12 d-flex flex-column overflow-scroll">
                <h4 class="mb-3">{{ __('names.products') }}</h4>
                <div style="min-width: 600px; box-shadow: 1px 1px 10px #efefef">
                    <div class="d-flex gap-2 px-4 fs-6 fw-bold text-dark" style="border: 1px solid lightgray; border-radius: 8px 8px 0 0">
                        <div class="d-flex align-items-center py-3" style="width: 75%">{{ __('table.productName') }}</div>
                        <div class="d-flex align-items-center py-3" style="width: 25%">{{ __('table.price') }}</div>
                        <div class="d-flex align-items-center py-3" style="width: 25%">{{ __('table.count') }}</div>
                    </div>
                    @include('user_views.orders.tables.order_items_table')
                </div>
            </div>
            <div class="col-12 d-flex flex-column overflow-scroll mt-40">
                <h4 class="mb-3">{{ __('names.orderHistory') }}</h4>
                <div style="min-width: 500px; box-shadow: 1px 1px 10px #efefef">
                    <div class="d-flex gap-2 px-4 fs-6 fw-bold text-dark" style="border: 1px solid lightgray; border-radius: 8px 8px 0 0">
                        <div class="d-flex align-items-center py-3" style="width: 50%">{{ __('table.date') }}</div>
                        <div class="d-flex align-items-center py-3" style="width: 50%">{{ __('table.action') }}</div>
                    </div>
                    @include('user_views.orders.tables.order_history_table')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .view-order-button {
            background-color: #e10000;
            padding: 10px 25px;
            border-radius: 7px;
            color: white;
            transition: background-color 1s;
        }

        .view-order-button:hover,
        .view-order-button:focus {
            background-color: #a52929;
            color: white;
        }
    </style>
@endpush

