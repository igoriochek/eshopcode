@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="col-lg-12 m-auto px-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="w-100">
                        @include('flash::message')
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center gap-3 mb-40">
                <div class="d-flex flex-column gap-2">
                    <h3 class="mb-3">{{__('names.return')}}: {{ $return->id }}</h3>
                    <div class="d-flex flex-column gap-3 fs-6">
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex gap-2">
                                {{ __('names.order')}} ID:
                                <strong>{{ $return->order_id }}</strong>
                            </div>
                            <div class="d-flex gap-2">
                                {{ __('table.description') }}:
                                <strong>{{ $return->description }}</strong>
                            </div>
                            <div style="height: 2px; background: lightgray; width: 50px" class="my-2"></div>
                            <div class="d-flex gap-2">
                                {{ __('names.returnStatus')}}:
                                <strong>{{ __("status." . $return->status->name) }}</strong>
                            </div>
                            <div class="d-flex gap-2">
                                {{ __('names.total') }}:
                                <strong>€{{ number_format($returnItemSum, 2) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-column overflow-scroll">
                <h4 class="mb-3">{{ __('names.products') }}</h4>
                <div style="min-width: 600px; box-shadow: 1px 1px 10px #efefef">
                    <div class="d-flex gap-2 px-4 fs-6 fw-bold text-dark" style="border: 1px solid lightgray; border-radius: 8px 8px 0 0">
                        <div class="d-flex align-items-center py-3" style="width: 75%">{{ __('table.productName') }}</div>
                        <div class="d-flex align-items-center py-3" style="width: 25%">{{ __('table.price') }}</div>
                        <div class="d-flex align-items-center py-3" style="width: 25%">{{ __('table.count') }}</div>
                    </div>
                    @include('user_views.returns.tables.return_items_table')
                </div>
            </div>
            <div class="col-12 d-flex flex-column overflow-scroll mt-40">
                <h4 class="mb-3">{{ __('names.orderHistory') }}</h4>
                <div style="min-width: 500px; box-shadow: 1px 1px 10px #efefef">
                    <div class="d-flex gap-2 px-4 fs-6 fw-bold text-dark" style="border: 1px solid lightgray; border-radius: 8px 8px 0 0">
                        <div class="d-flex align-items-center py-3" style="width: 50%">{{ __('table.date') }}</div>
                        <div class="d-flex align-items-center py-3" style="width: 50%">{{ __('table.action') }}</div>
                    </div>
                    @include('user_views.returns.tables.return_history_table')
                </div>
            </div>
        </div>
    </div>
@endsection

