@extends('layouts.app')

@section('title', __('names.return').' '.$return->id)
@section('parentTitle', __('menu.returns'))
@section('parentUrl', url('/user/rootreturns'))

@section('content')
    <div class="my-account-area ptb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-12">
                    <div class="mb-5">
                        @include('adminlte-templates::common.errors')
                        @include('flash_messages')
                    </div>
                    <div class="account-content">
                        <ul class="account-btns">
                            <li>
                                <a href="{{ url('/user/userprofile') }}">
                                    {{ __('menu.profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootorders') }}">
                                    {{__('menu.orders')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootoreturns') }}" class="active">
                                    {{ __('menu.returns') }}
                                </a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('menu.logout') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                        <div class="your-orders">
                            <h3 class="mb-2">{{ __('names.return').':' }} {{ $return->id }}</h3>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="d-flex flex-wrap align-items-center" style="column-gap: 10px; row-gap: 5px">
                                    <div>{{ __('table.status').': '.__("status.".$return->status->name) }}</div>
                                    <div>{{ __('table.sum').': €' }}{{ number_format($return->sum, 2) }}</div>
                                    <div>{{ __('table.date').': '.$return->created_at->format('M d, Y') }}</div>
                                </div>
                            </div>
                            <div class="orders-table table table-responsive">
                                <table class="table border">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('table.productName') }}</th>
                                            <th scope="col">{{ __('table.price') }}</th>
                                            <th scope="col">{{ __('table.count') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($returnItems as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>€{{ number_format($item->price_current, 2) }}</td>
                                                <td>{{ $item->count }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
@endsection

