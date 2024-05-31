@extends('layouts.app')

@section('title', __('names.order') . ' ' . $order->order_id)
@section('parentTitle', __('menu.orders'))
@section('parentUrl', url('/user/rootorders'))

@section('content')
    <div class="account-page-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/userprofile') }}">
                                {{ __('menu.profile') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/user/rootorders') }}">
                                {{ __('menu.orders') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/rootoreturns') }}">
                                {{ __('menu.returns') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                    <div class="tab-content myaccount-tab-content">
                        <div class="tab-pane fade active show">
                            <div class="myaccount-orders">
                                <h4 class="small-title">{{ __('names.orderDetails') }}</h4>
                                <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex flex-wrap" style="column-gap: 25px">
                                        <p><span>{{ __('names.order') . ' ID: ' }}</span>{{ $order->order_id }}</p>
                                        <p><span>{{ __('table.status') . ': ' }}</span>{{ __('status.' . $order->status->name) }}
                                        </p>
                                        <p><span>{{ __('table.sum') . ': ' }}</span>€{{ number_format($order->sum, 2) }}
                                        </p>
                                        <p><span>{{ __('table.date') . ': ' }}</span>{{ $order->created_at->format('M d, Y') }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center flex-wrap gap-3 mt-1">
                                        @if ($order->status->name == 'Returned')
                                            <div class="btn-group">
                                                <a href="{{ route('viewreturn', [$return->id]) }}"
                                                    class="btn btn-dark rounded-0">
                                                    {{ __('names.return') }}
                                                </a>
                                            </div>
                                        @endif
                                        @if ($order->status->name !== 'Returned' && $order->status->name !== 'Canceled')
                                            @if ($order->status->name !== 'Completed')
                                                <div class="btn-group">
                                                    <a href="{{ route('cancelnorder', [$order->id]) }}"
                                                        class="btn btn-dark rounded-0">
                                                        {{ __('buttons.cancel') }}
                                                    </a>
                                                </div>
                                            @endif
                                            @if ($order->status->name == 'Completed')
                                                <div class="btn-group">
                                                    <a href="{{ route('returnorder', [$order->id]) }}"
                                                        class="btn btn-dark rounded-0">
                                                        {{ __('buttons.return') }}
                                                    </a>
                                                </div>
                                            @endif
                                        @endif
                                        @if ($order->status->name == 'Completed' || $order->status->name == 'Returned')
                                            <div class="btn-group">
                                                <a href="{{ route('download_invoice', [$order->id]) }}"
                                                    class="btn btn-dark rounded-0">
                                                    {{ __('names.invoice') }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content myaccount-tab-content mt-4">
                        <div class="tab-pane fade active show">
                            <div class="myaccount-orders">
                                <h4 class="small-title">{{ __('names.orderItems') }}</h4>
                                <div class="table-responsive">
                                    @include('user_views.orders.tables.order_item_table')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content myaccount-tab-content mt-4">
                        <div class="tab-pane fade active show">
                            <div class="myaccount-orders">
                                <h4 class="small-title">{{ __('names.orderHistory') }}</h4>
                                <div class="table-responsive">
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
