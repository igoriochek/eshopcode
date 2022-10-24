@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'rootorders',
    'secondPageName' => __('names.orders'),
    'hasThirdPage' => true,
    'thirdPageName' => __('names.cancelOrder').' '.$order->order_id ,
])

    <div class="dashboard-content py-10">
        <div class="container">
            {!! Form::model($order, ['route' => ['savecancelnorder', $order->id], 'method' => 'post']) !!}
            <div class="row pt-10 d-flex justify-content-center">

                <div class="form-group col-sm-6">
                    {!! Form::label('description', __('names.desc')) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-12 d-flex justify-content-center pt-3">
                    {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary btn-hover-secondary']) !!}
                    <a href="{{ route('rootorders') }}"
                       class="btn btn-default btn-hover-danger">{{__('buttons.cancel')}}</a>
                </div>

            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection

