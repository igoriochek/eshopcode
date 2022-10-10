@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <div class="col-lg-10 m-auto">
            <div class="row justify-content-center">
                <div class="col-md-9">
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
                                                <th class="text-center">{{__('names.checkReturn')}}</th>
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
                <div class="form-group col-sm-6">
                    {!! Form::label('description', __('names.desc')) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row justify-content-center">
                {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary w-25']) !!}
                <a href="{{ route('rootorders') }}" class="btn btn-default w-25 ml-10">{{__('buttons.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

