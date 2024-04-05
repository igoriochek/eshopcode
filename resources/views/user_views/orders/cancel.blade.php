@extends('layouts.app')

@section('title', __("names.cancelOrder"))
@section('parentTitle', $order->order_id ?? __('names.order'))
@section('parentUrl', url('/user/vieworder/'.$order->id))

@section('content')
    <div class="my-account-area ptb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-12">
                    <div class="mb-5">
                        @include('adminlte-templates::common.errors')
                        @include('flash_messages')
                    </div>
                    <div class="account-content">
                        <ul class="account-btns">
                            <li>
                                <a href="{{ url('/user/userprofile') }}">
                                    {{ __('menu.profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootorders') }}" class="active">
                                    {{__('menu.orders')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootoreturns') }}">
                                    {{ __('menu.returns') }}
                                </a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('menu.logout') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                        <div class="your-orders">
                            <h3 class="mb-2">{{ __("names.cancelOrder").':' }} {{ $order->order_id }}</h3>
                            {!! Form::model($order, ['route' => ['savecancelnorder', $order->id], 'method' => 'post']) !!}
                                <div class="form-group col-12">
                                    {!! Form::label('description', __('names.desc') )!!}
                                    {!! Form::textarea('description', null, ['class' => "form-control"]) !!}
                                </div>
                                <div class="form-group d-flex align-items-center gap-3 mt-4">
                                    <button type="submit" class="default-btn style5" data-loading-text="Loading...">
                                        {{ __('buttons.save') }}
                                    </button>
                                    <a href="{{ url('/user/vieworder/'.$order->id) }}" class="btn btn-secondary rounded-0" style="padding: 13px 30px;">
                                        {{ __('buttons.cancel') }}
                                    </a>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

