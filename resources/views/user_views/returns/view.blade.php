@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12 d-flex flex-column gap-4">
                <div class="row">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between">
                        <div class="mb-2 mb-md-0">
                            <h3 class="mt-3 mb-1">
                                {{__('names.return')}}: {{ $return->id }}
                            </h3>
                            <span class="text-muted">
                                {{__('names.returnStatus')}}: {{ __("status." .$return->status->name) }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row bg-white mx-md-0">
                    <h5 class="my-2 ps-0">{{ __('names.products') }}</h5>
                    <div class="table table-responsive ps-0">
                        <table class="table table-striped table-bordered my-3">
                            <thead style="background: #e7e7e7;">
                            <tr>
                                <th class="px-3">{{__('table.productName')}}</th>
                                <th class="px-3">{{__('table.price')}}</th>
                                <th class="px-3">{{__('table.count')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($returnItems as $item)
                                <tr>
                                    <td class="px-3">{{ $item->product->name }}</td>
                                    <td class="px-3">{{ number_format($item->price_current,2) }} €</td>
                                    <td class="px-3">{{ $item->count }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row bg-white mx-md-0">
                    <h5 class="my-2 ps-0">{{ __('names.orderHistory') }}</h5>
                    @include('orders.history_table')
                </div>
            </div>
        </div>
    </div>
@endsection

