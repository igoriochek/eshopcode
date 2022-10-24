@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'rootorders',
    'secondPageName' => __('names.orders'),
    'hasThirdPage' => true,
    'thirdPageName' => __('names.order').' '.$order->order_id ,
])

    <div class="dashboard-content py-10">
        <div class="container">
            <div>{{__('names.orderStatus')}}: {{ __("status." . $order->status->name) }}</div>
            <div class="dashboard-purchase-history">
                <div class="dashboard-table table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            @if($order->status->name == "Returned")
                                <th class="status">{{__('table.status')}}</th>
                            @endif
                            <th class="name">{{__('table.productName')}}</th>
                            <th class="price">{{__('table.price')}}</th>
                            <th class="count">{{__('table.count')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderItems as $item)
                            <tr>
                                @if($order->status->name == "Returned")
                                    <td>
                                        @if ($item->isReturned !== null)
                                            <div class="dashboard-table__mobile-heading">{{__('table.status')}}</div>
                                            <div class="dashboard-table__text">{{__("status." .$item->isReturned)}}</div>
                                        @else
                                            &nbsp; &nbsp;
                                        @endif
                                    </td>
                                @endif
                                <td>
                                    <div class="dashboard-table__mobile-heading">{{__('table.productName')}}</div>
                                    <div class="dashboard-table__text">{{ $item->product->name }}</div>
                                </td>
                                <td>
                                    <div class="dashboard-table__mobile-heading">{{__('table.price')}}</div>
                                    <div class="dashboard-table__text">{{ number_format($item->price_current,2) }} €</div>
                                </td>
                                <td>
                                    <div class="dashboard-table__mobile-heading">{{__('table.count')}}</div>
                                    <div class="dashboard-table__text">{{ $item->count }}</div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if($order->status->name !== "Returned" && $order->status->name !== "Canceled")

                    <div class="btn-group" style="float: right">
                        <a href="{{ route('returnorder', [$order->id]) }}"
                           class='btn btn-default btn-xs'>
                            {{__('names.return')}} <i class="far fa-arrow-alt-circle-right"></i>
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
            </div>
        </div>
    </div>

    <div class="dashboard-content py-10">
        <div class="container">
            <h3 class="text-center text-muted">{{__('names.orderHistory')}}</h3>
            <div class="dashboard-purchase-history pt-3">
                @include('orders.history_table')
            </div>
        </div>
    </div>

@endsection

