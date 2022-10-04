@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.return') ])

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="../">{{__('menu.home')}}</a></li>
                <li><a href="/user/rootorders">{{ __('names.orders') }}</a></li>
                <li>{{ __('names.return') }}</li>
            </ul>
        </div>
    </div>

    <section>
        <div class="container margin_60">

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
                            <td>{{ number_format($item->price_current,2) }} €</td>
                            <td>{{ $item->count }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row ">
                <div class="form-group col-sm-6">
                    {!! Form::label('description', __('names.desc')) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::submit(__('buttons.save'), ['class' => 'btn_1 green']) !!}
                    <a href="{{ route('rootorders') }}" class="btn_1 white">{{__('buttons.cancel')}}</a>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </section>

@endsection

