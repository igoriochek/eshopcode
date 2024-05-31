@extends('layouts.app')

@section('title', __('names.cancelOrder'))
@section('parentTitle', __('names.order') . ' ' . $order->order_id)
@section('parentUrl', url('/user/vieworder/' . $order->id))

@section('content')
    <div class="account-page-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/userprofile') }}">
                                {{ __('menu.profile') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/user/rootorders') }}">
                                {{ __('menu.orders') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/rootoreturns') }}">
                                {{ __('menu.returns') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                    <div class="tab-content myaccount-tab-content">
                        <div class="tab-pane fade active show">
                            <div class="myaccount-orders">
                                <h4 class="small-title">{{ __('names.cancelOrder') }}</h4>
                                {!! Form::model($order, [
                                    'route' => ['savecancelnorder', $order->id],
                                    'method' => 'post',
                                    'class' => 'myaccount-form',
                                ]) !!}
                                <div class="myaccount-form-inner">
                                    <div class="single-input">
                                        {!! Form::label('description', __('names.desc')) !!}
                                        {!! Form::textarea('description', null, ['rows' => '5', 'style' => 'height: 160px; padding-block: 10px']) !!}
                                    </div>
                                    <div class="single-input">
                                        <button type="submit" class="btn btn-primary rounded-0 me-1">
                                            {{ __('buttons.save') }}
                                        </button>
                                        <a href="{{ url('/user/vieworder/' . $order->id) }}"
                                            class="btn btn-dark btn-primary-hover rounded-0 fs-6"
                                            style="padding-block: 6px">
                                            {{ __('buttons.cancel') }}
                                        </a>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
