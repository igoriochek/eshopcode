@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row m-2">
                <div class="col-sm-6">
                    <h1>[{{__('names.return')}}]</h1>
                </div>
            </div>
        </div>
    </section>

    <section>

        <div class="content px-3">

            @include('flash::message')

            <div class="clearfix"></div>
            {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
            <div class="table table-responsive">
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
                            <td>{{ $item->price_current }}</td>
                            <td>{{ $item->count }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('description', __('names.desc')) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('rootorders') }}" class="btn btn-default">{{__('buttons.cancel')}}</a>
                </div>

                {!! Form::close() !!}

            </div>

        </div>
    </section>

@endsection

