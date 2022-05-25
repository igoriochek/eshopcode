@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>[ {{__('names.orders')}} ]</h1>
            </div>
        </div>
    </div>
</section>

<section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        @if($order->status->name !== "Returned" && $order->status->name !== "Canceled")
            <div class="btn-group" style="float: right">
                <a href="{{ route('returnorder', [$order->id]) }}"
                   class='btn btn-default btn-xs'>
                    <i class="far fa-arrow-alt-circle-right"></i>
                </a>
            </div>
            <div class="btn-group" style="float: right">
                <a href="{{ route('cancelnorder', [$order->id]) }}"
                   class='btn btn-default btn-xs'>
                    <i class="far fa-trash-alt"></i>
                </a>
            </div>

        @endif



        <div>Order status: {{ $order->status->name }}</div>

        <div class="table table-responsive">
            <table class="table">
                <thead>
                <tr>
                    @if($order->status->name == "Returned")
                        <th class="text-center">Status</th>
                    @endif
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Count</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orderItems as $item)
                    <tr>
                        @if($order->status->name == "Returned")
                        <td class="text-center">{{$item->isReturned}}</td>
                        @endif
                        <td>{{ $item->product_id }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->price_current }}</td>
                        <td>{{ $item->count }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2>Order History</h2>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @include('orders.history_table')
            </div>
        </div>
    </div>
</div>
@endsection

