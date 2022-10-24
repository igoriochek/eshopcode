@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'rootorders',
    'secondPageName' => __('names.orders'),
    'hasThirdPage' => true,
    'thirdPageName' => __('names.return').' '.__('names.order').' '.$order->order_id ,
])

    <div class="dashboard-content py-10">
        <div class="container">
            <div class="dashboard-purchase-history">
                {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
                <div class="dashboard-table table-responsive">
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
                                    <div class="dashboard-table__mobile-heading">{{__('names.checkReturn')}}</div>
                                    <div class="dashboard-table__text">
                                    {!! Form::checkbox("return_items[]", $item->product_id, false) !!}
                                    </div>
                                </td>
                                <td>
                                    <div class="dashboard-table__mobile-heading">{{__('table.productId')}}</div>
                                    <div class="dashboard-table__text">{{ $item->product_id }}</div>
                                </td>
                                <td>
                                    <div class="dashboard-table__mobile-heading">{{__('table.productName')}}</div>
                                    <div class="dashboard-table__text"> {{ $item->product->name }}</div>
                                </td>
                                <td>
                                    <div class="dashboard-table__mobile-heading">{{__('table.price')}}</div>
                                    <div class="dashboard-table__text">{{ number_format($item->price_current,2) }} €</div>
                                </td>
                                <td>
                                    <div class="dashboard-table__mobile-heading">{{__('table.count')}}</div>
                                    <div class="dashboard-table__text">{{ $item->count }}</div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row pt-10 d-flex justify-content-center">
                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('description', __('names.desc')) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-md-12 d-flex justify-content-center pt-3">
                    {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary btn-hover-secondary']) !!}
                    <a href="{{ route('rootorders') }}"
                       class="btn btn-default btn-hover-danger">{{__('buttons.cancel')}}</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

