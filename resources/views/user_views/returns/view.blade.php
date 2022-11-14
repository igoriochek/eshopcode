@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("rootoreturns") ,'title' => __('names.returns'), 'paragraph'=>__('names.return').' '.$return->id ])
    <div class="container mt-3 mb-5">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12 d-flex flex-column gap-4">
                <div class="row">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between">
                        <div class="mb-2 mb-md-0">
                            <h3 class="mt-3 mb-1" style="font-family: 'Times New Roman', sans-serif">
                                {{__('names.return')}}: {{ $return->id }}
                            </h3>
                            <span class="text-muted">
                                {{__('names.returnStatus')}}: {{ __("status." .$return->status->name) }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row bg-white mx-md-0 px-0 py-3">
                    <h4 class="my-2" style="font-family: 'Times New Roman', sans-serif">{{ __('names.products') }}</h4>
                    <div class="table table-responsive">
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
                <div class="row bg-white mx-md-0 px-0 py-3">
                    <h4 class="my-2" style="font-family: 'Times New Roman', sans-serif">{{ __('names.orderHistory') }}</h4>
                    @include('orders.history_table')
                </div>
            </div>
        </div>
    </div>
@endsection

