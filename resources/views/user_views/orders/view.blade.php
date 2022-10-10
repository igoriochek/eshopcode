@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <div class="col-lg-10 m-auto">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="tab-pane account" id="orders">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">{{__('names.order')}}: {{ $order->order_id }}</h3>
                                @include('flash::message')
                                <div class="clearfix"></div>
                                @if($order->status->name !== "Returned" && $order->status->name !== "Canceled")
                                    <div class="btn-group mr-10" style="float: right">
                                        <a href="{{ route('cancelnorder', [$order->id]) }}">
                                            {{__('names.cancelOrder')}} <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group mr-10" style="float: right">
                                        <a href="{{ route('returnorder', [$order->id]) }}">
                                            {{__('names.return')}} <i class="far fa-arrow-alt-circle-right"></i>
                                        </a>
                                    </div>
                                    @if($order->status->name == 'Completed')
                                        <div class="btn-group mr-10" style="float: right">
                                            <a href="{{ route('download_invoice', [$order->id]) }}">
                                                {{__('names.invoice')}} <i class="fa-solid fa-file-invoice"></i>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                                <div>{{__('names.orderStatus')}}: {{ __("status." . $order->status->name) }}</div>
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
                        <div class="content px-3">
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

