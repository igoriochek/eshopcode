@extends('layouts.app')

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow">
                    <i class="fi-rs-home mr-5"></i>
                    {{ __('menu.home') }}
                </a>
                <span></span>
                <a href="{{ url("/user/rootorders") }}">
                    {{ __('menu.orders') }}
                </a>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="col-lg-12 m-auto px-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="w-100">
                        @include('flash::message')
                    </div>
                    <h3 class="m-0 p-0 mb-35 mt-4">{{ __('names.myOrders') }}</h3>
                </div>
                <div class="col-12 d-flex flex-column overflow-scroll">
                    <div style="min-width: 900px; box-shadow: 1px 1px 10px #efefef">
                        <div class="d-flex gap-2 px-4 fs-6 fw-bold text-dark" style="border: 1px solid lightgray; border-radius: 8px 8px 0 0">
                            <div class="d-flex align-items-center py-3" style="width: 15%">{{ __('names.order') }} ID</div>
                            <div class="d-flex align-items-center py-3" style="width: 15%">{{ __('table.status') }}</div>
                            <div class="d-flex align-items-center py-3" style="width: 20%">{{ __('table.collectTime') }}</div>
                            <div class="d-flex align-items-center py-3" style="width: 28%">{{ __('names.eatLocation') }}</div>
                            <div class="d-flex align-items-center py-3" style="width: 15%">{{ __('table.sum') }}</div>
                            <div class="d-flex align-items-center py-3" style="width: 17%">{{ __('table.date') }}</div>
                            <div class="d-flex align-items-center py-3" style="width: 110px"></div>
                        </div>
                        @include('user_views.orders.tables.orders_table')
                    </div>
                </div>
                @if (count($orders) > 0)
                    <div class="pagination-area mt-30 mb-20 d-flex justify-content-center">
                        {{ $orders->onEachSide(1)->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

