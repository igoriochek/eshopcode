@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <div class="col-lg-10 m-auto">
            <div class="row">
                <h3 class="mb-20">{{__("names.cancelOrder")}}: {{ $order->order_id }}</h3>
                @include('flash::message')
                <div class="clearfix"></div>
                <div class="conatiner">
                    {!! Form::model($order, ['route' => ['savecancelnorder', $order->id], 'method' => 'post']) !!}
                    <div class="row justify-content-center">
                        <div class="form-group col-sm-6">
                            {!! Form::label('description', __('names.desc')) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary w-25']) !!}
                        <a href="{{ route('rootorders') }}" class="btn btn-default w-25 ml-10">{{__('buttons.cancel')}}</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

