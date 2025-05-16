@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <section class="content-header">
            <div class="mb-4 text-uppercase">
                <h5>{{ __('names.order') }} : {{ $order->order_id }}</h5>
            </div>
        </section>

        <section>

            <div class="content">

                @include('flash::message')

                <div class="clearfix"></div>

                @if ($order->status->name !== 'Returned' && $order->status->name !== 'Canceled')
                    <div class="btn-group" style="float: right">
                        <a href="{{ route('returnorder', [$order->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-arrow-alt-circle-right"></i>
                        </a>
                    </div>
                    <div class="btn-group" style="float: right">
                        <a href="{{ route('cancelnorder', [$order->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </div>
                    @if ($order->status->name == 'Completed')
                        <div class="btn-group" style="float: right">
                            <a href="{{ route('download_invoice', [$order->id]) }}" class='btn btn-default btn-xs'>
                                {{ __('names.invoice') }} <i class="fa-solid fa-file-invoice"></i>
                            </a>
                        </div>
                    @endif
                @endif

                <div class="my-2">
                    <div>
                        <strong>{{ __('names.orderStatus') }}:</strong>
                        {{ __('status.' . $order->status->name) }}
                    </div>
                    <div>
                        <strong>{{ __('names.companyPurchase') }}: </strong>
                        @if ($order->company_purchase)
                            <i class="fa-solid fa-check"></i>
                        @else
                            <i class="fa-solid fa-xmark"></i>
                        @endif
                    </div>
                </div>

                <div class="table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                @if ($order->status->name == 'Returned')
                                    <th class="text-center">{{ __('table.status') }}</th>
                                @endif
                                {{--                        <th>{{__('table.productId')}}</th> --}}
                                <th>{{ __('table.productName') }}</th>
                                <th>{{ __('table.price') }}</th>
                                <th>{{ __('table.count') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $item)
                                <tr>
                                    @if ($order->status->name == 'Returned')
                                        <td class="text-center">
                                            @if ($item->isReturned !== null)
                                                {{ __('status.' . $item->isReturned) }}
                                            @else
                                                &nbsp;
                                            @endif
                                        </td>
                                    @endif
                                    {{--                        <td>{{ $item->product_id }}</td> --}}
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ number_format($item->price_current, 2) }}</td>
                                    <td>{{ $item->count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="content-header">
            <div class="mb-4 text-uppercase">
                <h6>{{ __('names.orderHistory') }}</h6>
            </div>
        </section>

        <div class="content">
            <div class="col">
                <div class="row">
                    @include('orders.history_table')
                </div>
            </div>
        </div>

    </div>
@endsection
