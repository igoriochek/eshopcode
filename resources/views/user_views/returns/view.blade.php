@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>[{{__('names.returns')}}]</h1>
            </div>
        </div>
    </div>
</section>

<section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

{{--        <div class="btn-group" style="float: right">--}}
{{--            <a href="{{ route('returnorder', [$return->id]) }}"--}}
{{--               class='btn btn-default btn-xs'>--}}
{{--                <i class="far fa-trash-alt"></i>--}}
{{--            </a>--}}
{{--        </div>--}}

        <div>{{__('names.returnStatus')}}: {{ $return->status->name }}</div>

        <div class="table table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>{{__('table.productId')}}</th>
                    <th>{{__('table.productName')}}</th>
                    <th>{{__('table.price')}}</th>
                    <th>{{__('table.count')}}</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($returnItems as $item)
                    <tr>
                        <td>{{ $item->product_id }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->price_current }}</td>
                        <td>{{ $item->count }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2>{{__('names.orderHistory')}}</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('orders.history_table')
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

