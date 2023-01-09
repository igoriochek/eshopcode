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
                <span></span>
                <a href="{{ url("/user/vieworder/$order->id") }}">
                    {{ $order->id ?? '-' }}
                </a>
                <span></span>
                <a href="{{ url("/user/returnorder/$order->id") }}">
                    {{ __('names.return') }}
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
                                <h3 class="mb-0">{{__('names.return')}} {{__('names.order')}} : {{ $order->order_id }}</h3>
                                @include('flash::message')
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body">
                                {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 200px">{{__('names.checkReturn')}}</th>
                                                <th>{{__('table.productId')}}</th>
                                                <th>{{__('table.productName')}}</th>
                                                <th>{{__('table.price')}}</th>
                                                <th>{{__('table.count')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orderItems as $item)
                                            <tr>
                                                <td class="text-center">
                                                    {!! Form::checkbox("return_items[]", $item->product_id, false) !!}
                                                </td>
                                                <td>{{ $item->product_id }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ number_format($item->price_current,2) }} €</td>
                                                <td>{{ $item->count }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Name Field -->
                <div class="form-group col-12 px-4">
                    {!! Form::label('description', __('names.desc')) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'style' => 'height: 150px']) !!}
                </div>
            </div>
            <div class="row justify-content-center px-4 gap-4">
                {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary col-xl-4 col-lg-5 col-md-6 col-12']) !!}
                <a href="{{ url("/user/vieworder/$order->id") }}" class="cancel-button col-xl-4 col-lg-5 col-md-6 col-12">{{__('buttons.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .cancel-button {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: transparent;
            padding: 10px 25px;
            border-radius: 7px;
            color: #e10000;
            border: 2px #e10000 solid;
            transition: .3s;
        }

        .cancel-button:hover,
        .cancel-button:focus {
            background-color: #e10000;
            border: 2px #e10000 solid;
            color: white;
        }
    </style>
@endpush

