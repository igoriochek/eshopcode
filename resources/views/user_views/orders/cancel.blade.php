@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("rootorders") ,'title' => __('names.orders'), 'paragraph'=>__('names.cancelOrder').' '.$order->order_id ])
    <div class="container mt-3 mb-5">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12 d-flex flex-column gap-4">
                <div class="mt-3">
                    <h3 style="font-family: 'Times New Roman', sans-serif">
                        {{__("names.cancelOrder")}}: {{ $order->id }}
                    </h3>
                </div>
                <div class="row bg-white mx-md-0 px-0 pb-3">
                    {!! Form::model($order, ['route' => ['savecancelnorder', $order->id], 'method' => 'post', 'class' => 'py-2']) !!}
                    <div class="form-group col-sm-12">
                        {!! Form::label('description', __('names.desc'), ['class' => 'fs-6 mb-2']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'style' => 'border-color: lightgray; border-radius: 0']) !!}
                    </div>
                    <div class="form-group col-sm-12 d-flex flex-column flex-md-row justify-content-md-center align-items-sm-center gap-3 mt-4">
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

