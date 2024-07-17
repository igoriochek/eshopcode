@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.orderDetails')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('orders.index') }}" class="btn btn-primary float-end">
                        {{__('buttons.back')}}
                    </a>
                    @if($order->status->name == 'Completed')
                        <div class="btn-group float-end">
                            <a href="{{ route('download_invoice', [$order->id]) }}" class="btn btn-primary btn-xs">
                                {{__('names.invoice')}} <i class="fa-solid fa-file-invoice"></i>
                            </a>
                        </div>
                        <div class="btn-group float-end">
                            <a href="{{ route('invoice', [$order->id]) }}" class="btn btn-primary btn-xs">
                                {{__('names.invoicePreview')}} <i class="fa-solid fa-file-invoice"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('orders.show_fields')
                </div>
            </div>
        </div>
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{__('names.orderItems')}}</h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('orderItems.create', ['order_id' => $order->id]) }}" class="btn btn-primary float-end">
                        {{__('buttons.addNew')}}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('order_items.table')
                </div>
            </div>
        </div>
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{__('names.orderHistory')}}</h2>
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
