@extends('layouts.app')

@section('title', __('names.return').' '.$return->id)
@section('parentTitle', __('menu.returns'))
@section('parentUrl', url('/user/rootreturns'))

@section('content')
<div class="my-account pb-5">
    <div class="container">
        <div class="row">
            <div class="mb-5">
                @include('adminlte-templates::common.errors')
                @include('flash_messages')
            </div>
            <div class="col-12">
                <h3 class="title">{{ __('names.yourAccount') }}</h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="{{ url('/user/userprofile') }}">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-user"></i>
                            </span>
                            <h4 class="sub-title">
                                {{ __('menu.profile') }}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="{{ url('/user/rootorders') }}">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-shopping-basket"></i>
                            </span>
                            <h4 class="sub-title">
                                {{__('menu.orders')}}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="{{ url('/user/rootoreturns') }}">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-arrow-circle-left " style="color: #0b88ee;"></i>
                            </span>
                            <h4 class="sub-title" style="color: black;">
                                {{ __('menu.returns') }}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12">
                <div class="log-out-btn text-center">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-dark3 my-5">{{ __('menu.logout') }}</a>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <hr class="my-4" />
                    <h3 class="contact-page-title">{{ __('names.return').':' }} {{ $return->id }}</h3>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-wrap align-items-center" style="column-gap: 10px; row-gap: 5px">
                            <div>{{ __('table.status').': '.__("status.".$return->status->name) }}</div>
                            <div>{{ __('table.sum').': €' }}{{ number_format($return->sum, 2) }}</div>
                            <div>{{ __('table.date').': '.$return->created_at->format('M d, Y') }}</div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center th-col" style="text-transform: none !important;">{{ __('table.productName') }}</th>
                                    <th scope="col" class="text-center th-col">{{ __('table.price') }}</th>
                                    <th scope="col" class="text-center th-col">{{ __('table.count') }}</th>
                                    <th scope="col" class="text-center th-col" style="text-transform: none !important;">{{ __('table.productComplex') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($returnItems as $item)
                                <tr>
                                    <td class="text-center">{{ $item->product->name }}</td>
                                    <td class="text-center">€{{ number_format($item->price_current, 2) }}</td>
                                    <td class="text-center">{{ $item->count }}</td>
                                    <td class="text-center">
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
                    <hr class="my-4" />
                    <h3 class="contact-page-title">{{ __('names.orderHistory') }}</h3>
                    @include('orders.history_table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .th-col {
        background-color: #0090f0 !important;
        border-color: transparent !important;
        color: #fff !important;
        text-transform: none !important;
    }
</style>
@endpush