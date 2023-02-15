@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("rootorders") ,'title' => __('names.orders'), 'paragraph'=>__('names.return').' '.__('names.order').' '.$order->order_id ])
    <div class="container mt-3 mb-5">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12 d-flex flex-column gap-4">
                <div class="mt-3">
                    <h3 style="font-family: 'Times New Roman', sans-serif">
                        {{ __("names.return").' '.__('names.order') }}: {{ $order->id }}
                    </h3>
                </div>
                <div class="row bg-white mx-md-0 px-0 py-3">
                    <h4 class="mt-2 mb-4" style="font-family: 'Times New Roman', sans-serif">{{ __('names.products') }}</h4>
                    {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
                    <div class="table table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead style="background: #e7e7e7;">
                            <tr>
                                <th class="text-center">{{__('names.checkReturn')}}</th>
                                <th class="px-3">{{__('table.productId')}}</th>
                                <th class="px-3">{{__('table.productName')}}</th>
                                <th class="px-3">{{__('table.price')}}</th>
                                <th class="px-3">{{__('table.count')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderItems as $item)
                                <tr>
                                    <td class="text-center pb-3" width="150px">
                                        {!! Form::checkbox("return_items[]", $item->product_id, false, ['class' => 'form-check-input', 'style' => 'cursor: pointer; border-radius: 0; width: 20px; height: 20px']) !!}
                                    </td>
                                    <td class="px-3">{{ $item->product_id }}</td>
                                    <td class="px-3">{{ $item->product->name }}</td>
                                    <td class="px-3">€{{ number_format($item->price_current,2) }}</td>
                                    <td class="px-3">{{ $item->count }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('description', __('names.desc'), ['class' => 'fs-6 mb-2']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'style' => 'border-color: lightgray; border-radius: 0']) !!}
                    </div>
                    <div class="form-group col-sm-12 d-flex flex-column flex-md-row justify-content-md-center align-items-sm-center gap-3 my-4">
                        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary orders-returns-primary-button col-lg-3 col-md-4 col-sm-12']) !!}
                        <a href="{{ url()->previous() }}" class="btn btn-secondary orders-returns-secondary-button col-lg-3 col-md-4 col-sm-12">
                            {{__('buttons.cancel')}}
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

