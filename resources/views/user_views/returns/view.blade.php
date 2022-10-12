@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.return').' '.$return->id])

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="/user/rootoreturns">{{ __('names.returns') }}</a></li>
                <li>{{__('names.return')}}: {{ $return->id }}</li>
            </ul>
        </div>
    </div>

    <div class="container margin_60">

        @include('flash::message')

        <div class="clearfix"></div>

{{--        <div class="btn-group" style="float: right">--}}
{{--            <a href="{{ route('returnorder', [$return->id]) }}"--}}
{{--               class='btn btn-default btn-xs'>--}}
{{--                <i class="far fa-trash-alt"></i>--}}
{{--            </a>--}}
{{--        </div>--}}



        <div class="table table-responsive">
            <table class="table">
                <thead>
                <tr>
{{--                    <th>{{__('table.productId')}}</th>--}}
                    <th>{{__('table.productName')}}</th>
                    <th>{{__('table.price')}}</th>
                    <th>{{__('table.count')}}</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($returnItems as $item)
                    <tr>
{{--                        <td>{{ $item->product_id }}</td>--}}
                        <td>{{ $item->product->name }}</td>
                        <td>{{ number_format($item->price_current,2) }} €</td>
                        <td>{{ $item->count }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div>{{__('names.returnStatus')}}: {{ __("status." .$return->status->name) }}</div>
        </div>

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{__('names.orderHistory')}}</h2>
                </div>
            </div>
        </div>

        <div class="content px-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include('orders.history_table')
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

