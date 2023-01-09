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
        <div class="col-lg-10 m-auto">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="tab-pane account" id="orders">
                        <div class="card">
                            @include('flash::message')
                            <div class="clearfix"></div>
                            <div class="card-header d-flex flex-column flex-md-row justify-content-md-between align-items-md-center gap-3">
                                <div class="d-flex flex-column gap-2">
                                    <h3 class="mb-0">{{__('names.order')}}: {{ $order->order_id }}</h3>
                                    <div>{{__('names.orderStatus')}}: {{ __("status." . $order->status->name) }}</div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-md-0 gap-3 mb-md-0 mb-4">
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            @if($order->status->name == "Returned")
                                                <th class="text-center">{{__('table.status')}}</th>
                                            @endif
                                                <th>{{__('table.productName')}}</th>
                                                <th>{{__('table.price')}}</th>
                                                <th>{{__('table.count')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orderItems as $item)
                                            <tr>
                                                @if($order->status->name == "Returned")
                                                    <td class="text-center">{{$item->isReturned}}</td>
                                                @endif
                                                    <td>{{ $item->product->name }}</td>
                                                    <td>{{ number_format($item->price_current,2) }} €</td>
                                                    <td>{{ $item->count }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="content px-0">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{__('names.orderHistory')}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @include('orders.history_table')
                                    </div>
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

