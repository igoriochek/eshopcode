@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <section class="content-header">
            <div class="mb-4 text-uppercase">
                <h5>{{ __('names.return') }}: {{ $return->id }}</h5>
            </div>
        </section>

        <section>

            <div class="content">

                @include('flash::message')

                <div class="clearfix"></div>

                {{--        <div class="btn-group" style="float: right"> --}}
                {{--            <a href="{{ route('returnorder', [$return->id]) }}" --}}
                {{--               class='btn btn-default btn-xs'> --}}
                {{--                <i class="far fa-trash-alt"></i> --}}
                {{--            </a> --}}
                {{--        </div> --}}

                <div class="my-2">
                    <div>
                        <strong>{{ __('names.returnStatus') }}:</strong>
                        {{ __('status.' . $return->status->name) }}
                    </div>
                    <div>
                        <strong>{{ __('names.companyPurchase') }}: </strong>
                        @if ($return->order->company_purchase)
                            <i class="fa-solid fa-check"></i>
                        @else
                            <i class="fa-solid fa-xmark"></i>
                        @endif
                    </div>
                </div>

                <div class="table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                {{--                    <th>{{__('table.productId')}}</th> --}}
                                <th>{{ __('table.productName') }}</th>
                                <th>{{ __('table.price') }}</th>
                                <th>{{ __('table.count') }}</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($returnItems as $item)
                                <tr>
                                    {{--                        <td>{{ $item->product_id }}</td> --}}
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ number_format($item->price_current, 2) }}</td>
                                    <td>{{ $item->count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </section>

        <section class="content-header">
            <div class="mb-4 text-uppercase">
                <h6>{{ __('names.orderHistory') }}</h6>
            </div>
        </section>

        <section>
            <div class="content">
                <div class="col">
                    <div class="row">
                        @include('orders.history_table')
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
