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
                <a href="{{ url("/user/cancelorder/$order->id") }}">
                    {{ __('names.cancelOrder') }}
                </a>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="col-lg-10 m-auto">
            <div class="row">
                @include('flash::message')
                <div class="clearfix"></div>
                <h3 class="mb-20">{{__("names.cancelOrder")}}: {{ $order->order_id }}</h3>
                <div class="conatiner">
                    {!! Form::model($order, ['route' => ['savecancelnorder', $order->id], 'method' => 'post']) !!}
                    <div class="row justify-content-center">
                        <div class="form-group col-12">
                            {!! Form::label('description', __('names.desc')) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5', 'style' => 'height: 150px']) !!}
                        </div>
                    </div>
                    <div class="row justify-content-center px-4 gap-4">
                        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary col-xl-4 col-lg-5 col-md-6 col-12']) !!}
                        <a href="{{ url("/user/vieworder/$order->id") }}" class="cancel-button col-xl-4 col-lg-5 col-md-6 col-12">
                            {{__('buttons.cancel')}}
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
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

