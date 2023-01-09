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
                <a href="{{ url("/user/rootoreturns") }}">
                    {{ __('menu.returns') }}
                </a>
                <span></span>
                <a href="{{ url("/user/viewtrurn/$return->id") }}">
                    {{ $return->id ?? '-' }}
                </a>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="col-lg-10 m-auto">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="tab-pane account" id="orders">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-2">{{__('names.return')}}: {{ $return->id }}</h3>
                                @include('flash::message')
                                <div class="clearfix"></div>
                                <div>{{__('names.returnStatus')}}: {{ __("status." .$return->status->name) }}</div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>{{__('table.productName')}}</th>
                                            <th>{{__('table.price')}}</th>
                                            <th>{{__('table.count')}}</th>
                                            <th> </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($returnItems as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ number_format($item->price_current, 2) }} €</td>
                                                <td>{{ $item->count }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="content px-0">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{__('names.orderHistory')}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @include('orders.history_table')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

