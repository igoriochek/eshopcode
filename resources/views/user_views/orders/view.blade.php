@extends('layouts.app')

@section('title', __('names.order').' '.$order->order_id)
@section('parentTitle', __('menu.orders'))
@section('parentUrl', url('/user/rootorders'))

@section('content')
<section class="main_content_area" style="padding-top: 0px;">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="mb-5">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li>
                                <a href="{{ url('/user/userprofile') }}" class="nav-link">{{ __('menu.profile') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootorders') }}" class="nav-link active">{{__('menu.orders') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootoreturns') }}" class="nav-link">{{ __('menu.returns') }}</a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">{{ __('menu.logout') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active">
                            <h3>{{ __('names.order').':' }} {{ $order->order_id }}</h3>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-start" style="column-gap: 10px; row-gap: 5px;">
                                    <p>{{ __('table.status').': '.__("status.".$order->status->name) }}</p>
                                    <p>{{ __('table.sum').': €' }}{{ number_format($order->sum, 2) }}</p>
                                    <p>{{ __('table.date').': '.$order->created_at->format('M d, Y') }}</p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    @if ($order->status->name !== "Returned" && $order->status->name !== "Canceled")
                                    @if ($order->status->name !== 'Completed')
                                    <div class="btn-group">
                                        <a href="{{ route('cancelnorder', [$order->id]) }}">
                                            {{__('names.cancelOrder')}}
                                        </a>
                                    </div>
                                    @endif
                                    @if ($order->status->name == 'Completed')
                                    <div class="btn-group me-4">
                                        <a href="{{ route('returnorder', [$order->id]) }}">
                                            {{__('names.returnOrder')}}
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('download_invoice', [$order->id]) }}">
                                            {{__('names.invoice')}}
                                        </a>
                                    </div>
                                    @endif
                                    @else
                                    <div class="btn-group">
                                        <a href="{{ route('download_invoice', [$order->id]) }}">
                                            {{__('names.invoice')}}
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            @if ($order->status->name == 'Returned')
                                            <th>{{ __('table.status') }}</th>
                                            @endif
                                            <th>{{ __('table.productName') }}</th>
                                            <th>{{ __('table.price') }}</th>
                                            <th>{{ __('table.count') }}</th>
                                            <th>{{ __('table.productComplex') }}</th>
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
                            <h3>{{ __('names.orderHistory') }}</h3>
                            <div class="table-responsive">
                                @include('orders.history_table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    .btn-group a {
        color: #79a206;
        font-weight: 500;
    }

    .btn-group a:hover {
        color: #79a206;
    }
</style>