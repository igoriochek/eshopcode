@extends('layouts.app')

@section('title', __('names.order').' '.$order->order_id)
@section('parentTitle', __('menu.orders'))
@section('parentUrl', url('/user/rootorders'))

@section('content')
    <div class="my-account-area ptb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-12">
                    <div class="mb-5">
                        @include('adminlte-templates::common.errors')
                        @include('flash_messages')
                    </div>
                    <div class="account-content">
                        <ul class="account-btns">
                            <li>
                                <a href="{{ url('/user/userprofile') }}">
                                    {{ __('menu.profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootorders') }}" class="active">
                                    {{__('menu.orders')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootoreturns') }}">
                                    {{ __('menu.returns') }}
                                </a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('menu.logout') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                        <div class="your-orders">
                            <h3 class="mb-2">{{ __('names.order').':' }} {{ $order->order_id }}</h3>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="d-flex flex-wrap align-items-center" style="column-gap: 10px; row-gap: 5px">
                                    <div>{{ __('table.status').': '.__("status.".$order->status->name) }}</div>
                                    <div>{{ __('table.sum').': €' }}{{ number_format($order->sum, 2) }}</div>
                                    <div>{{ __('table.date').': '.$order->created_at->format('M d, Y') }}</div>
                                </div>
                                <div class="d-flex justify-content-start align-items-center">
                                    @if ($order->status->name !== "Returned" && $order->status->name !== "Canceled")
                                        @if ($order->status->name !== 'Completed')
                                            <div class="btn-group" style="float: right">
                                                <a href="{{ route('cancelnorder', [$order->id]) }}" class='btn btn-default btn-xs'>
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        @endif
                                        @if ($order->status->name == 'Completed')
                                            <div class="btn-group" style="float: right">
                                                <a href="{{ route('returnorder', [$order->id]) }}" class='btn btn-default btn-xs'>
                                                    <i class="far fa-arrow-alt-circle-right"></i>
                                                </a>
                                            </div>
                                        @endif
                                        @if ($order->status->name == 'Completed')
                                            <div class="btn-group" style="float: right">
                                                <a href="{{ route('download_invoice', [$order->id]) }}" class='btn btn-default btn-xs'>
                                                    {{__('names.invoice')}} <i class="fa-solid fa-file-invoice"></i>
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="orders-table table table-responsive">
                                <table class="table border">
                                    <thead>
                                        <tr>
                                            @if ($order->status->name == 'Returned')
                                                <th scope="col">{{ __('table.status') }}</th>
                                            @endif
                                            <th scope="col">{{ __('table.productName') }}</th>
                                            <th scope="col">{{ __('table.price') }}</th>
                                            <th scope="col">{{ __('table.count') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderItems as $item)
                                            <tr>
                                                @if ($order->status->name == 'Returned')
                                                    <td>
                                                        @if ($item->isReturned !== null)
                                                            {{ $item->isReturned }}
                                                        @else
                                                            &nbsp;
                                                        @endif
                                                    </td>
                                                @endif
                                                <td>{{ $item->product->name }}</td>
                                                <td>€{{ number_format($item->price_current, 2) }}</td>
                                                <td>{{ $item->count }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr class="mt-5 mb-4" />
                            <h3>{{ __('names.orderHistory') }}</h3>
                            @include('orders.history_table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

