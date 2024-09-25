@extends('layouts.app')

@section('title', __('names.return').' '.$return->id)
@section('parentTitle', __('menu.returns'))
@section('parentUrl', url('/user/rootreturns'))

@section('content')
<div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="mb-5">
                        @include('adminlte-templates::common.errors')
                        @include('flash_messages')
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link" href="{{ url('/user/userprofile') }}" aria-selected="false"><i class="fas fa-user"></i>{{ __('menu.profile') }}</a>
                                        <a class="nav-item nav-link" href="{{ url('/user/rootorders') }}" aria-selected="false"><i class="fas fa-shopping-basket"></i>{{__('menu.orders')}}</a>
                                        <a class="nav-item nav-link active" href="{{ url('/user/rootoreturns') }}" aria-selected="false"><i class="fas fa-arrow-circle-left "></i>{{ __('menu.returns') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="nav-item nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fal fa-sign-out"></i>{{ __('menu.logout') }}
                                        </a>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-returns" role="tabpanel">
                                    <div class="your-orders">
                                        <h3 class="mb-2">{{ __('names.return').':' }} {{ $return->id }}</h3>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="d-flex flex-wrap align-items-center" style="column-gap: 10px; row-gap: 5px">
                                                <div>{{ __('table.status').': '.__("status.".$return->status->name) }}</div>
                                                <div>{{ __('table.sum').': €' }}{{ number_format($return->sum, 2) }}</div>
                                                <div>{{ __('table.date').': '.$return->created_at->format('M d, Y') }}</div>
                                            </div>
                                        </div>
                                        <div class="axil-dashboard-order">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">{{ __('table.productName') }}</th>
                                                            <th scope="col">{{ __('table.price') }}</th>
                                                            <th scope="col">{{ __('table.count') }}</th>
                                                            <th scope="col">{{ __('table.productComplex') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($returnItems as $item)
                                                            <tr>
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
                                        </div>
                                        <hr class="mt-5 mb-4" />
                                        <h3>{{ __('names.orderHistory') }}</h3>
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

