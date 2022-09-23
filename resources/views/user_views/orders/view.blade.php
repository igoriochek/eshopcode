@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.order') ])

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="../">{{__('menu.home')}}</a></li>
                <li><a href="/user/rootorders">{{ __('names.orders') }}</a></li>
                <li>{{ __('names.orderNr') }} {{ __($order->id) }} </li>
            </ul>
        </div>
    </div>

    <div class="container margin_60">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="table table-responsive">
            <table class="table">
                <thead>
                <tr>
                    @if($order->status->name == "Returned")
                        <th class="text-center">Status</th>
                    @endif
                        <th>{{__('table.productId')}}</th>
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
                        <td>{{ $item->product_id }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->price_current }}</td>
                        <td>{{ $item->count }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @if($order->status->name !== "Returned" && $order->status->name !== "Canceled")

                <div class="btn-group" style="float: right">
                    <a href="{{ route('returnorder', [$order->id]) }}"
                       class='btn btn-default btn-xs'>
                        {{__('names.return')}}<i class="far fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
                <div class="btn-group" style="float: right">
                    <a href="{{ route('cancelnorder', [$order->id]) }}"
                       class='btn btn-default btn-xs'>
                        {{__('names.cancelOrder')}} <i class="far fa-trash-alt"></i>
                    </a>
                </div>
                @if($order->status->name == 'Completed')
                    <div class="btn-group" style="float: right">
                        <a href="{{ route('download_invoice', [$order->id]) }}"
                           class='btn btn-default btn-xs'>
                            {{__('names.invoice')}} <i class="fa-solid fa-file-invoice"></i>
                        </a>
                    </div>
                @endif
            @endif

            <div>{{__('names.orderStatus')}}: {{ $order->status->name }}</div>

        </div>

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{__('names.orderHistory')}}</h2>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @include('orders.history_table')
            </div>
        </div>


    </div>

@endsection

