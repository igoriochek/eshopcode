@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'rootoreturns',
    'secondPageName' => __('names.returns'),
    'hasThirdPage' => true,
    'thirdPageName' => __('names.return').' '.$return->id ,
])

    <div class="dashboard-content py-10">
        <div class="container">
            <div>{{__('names.returnStatus')}}: {{ __("status." .$return->status->name) }}</div>
            <div class="dashboard-purchase-history">
                <div class="dashboard-table table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="name">{{__('table.productName')}}</th>
                            <th class="price">{{__('table.price')}}</th>
                            <th class="count">{{__('table.count')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($returnItems as $item)
                            <tr>
                                <td>
                                    <div class="dashboard-table__mobile-heading">{{__('table.productName')}}</div>
                                    <div class="dashboard-table__text">{{ $item->product->name }}</div>
                                </td>
                                <td>
                                    <div class="dashboard-table__mobile-heading">{{__('table.price')}}</div>
                                    <div
                                        class="dashboard-table__text">{{ number_format($item->price_current,2) }} €
                                    </div>
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

