@extends('layouts.app')

@section('title', __("names.cancelOrder"))
@section('parentTitle', __('names.order').' '.$order->order_id)
@section('parentUrl', url('/user/vieworder/'.$order->id))

@section('content')
<!-- <div class="my-account pb-5">
    <div class="container">
        <div class="row">
            <div class="mb-5">
                @include('adminlte-templates::common.errors')
                @include('flash_messages')
            </div>
            <div class="col-12">
                <h3 class="title">{{ __('names.yourAccount') }}</h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="{{ url('/user/userprofile') }}">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-user"></i>
                            </span>
                            <h4 class="sub-title">
                                {{ __('menu.profile') }}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="{{ url('/user/rootorders') }}">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-shopping-basket" style="color: #0b88ee;"></i>
                            </span>
                            <h4 class="sub-title" style="color: black;">
                                {{__('menu.orders')}}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="{{ url('/user/rootoreturns') }}">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-arrow-circle-left "></i>
                            </span>
                            <h4 class="sub-title">
                                {{ __('menu.returns') }}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12">
                <div class="log-out-btn text-center">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-dark3 my-5">{{ __('menu.logout') }}</a>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <hr class="my-4" />
                    <h3 class="contact-page-title">{{ __("names.cancelOrder").':' }} {{ $order->order_id }}</h3>
                    {!! Form::model($order, ['route' => ['savecancelnorder', $order->id], 'method' => 'post']) !!}
                    <div class="form-group col-12">
                        {!! Form::label('description', __('names.desc') )!!}
                        {!! Form::textarea('description', null, ['class' => "form-control"]) !!}
                    </div>
                    <div class="form-group d-flex align-items-center gap-3 mt-4">
                        <input type="submit" class="btn btn-primary" style="padding: 13px 30px; height: 51px; border-radius: 5px; text-transform: capitalize;" data-loading-text="Loading..." value="{{ __('buttons.save') }}">
                        </input>
                        <a href="{{ url('/user/vieworder/'.$order->id) }}" class="btn btn-dark3" style="padding: 13px 30px;">
                            {{ __('buttons.cancel') }}
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div> -->
<section class="section-shop padding-b-50">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="mb-5">
                @include('adminlte-templates::common.errors')
                @include('flash_messages')
            </div>
            <div class="col-lg-3 col-12 mb-24">
                <div class="bb-shop-wrap">
                    <div class="bb-sidebar-block">
                        <div class="bb-sidebar-title">
                            <h3>{{ __('names.yourAccount') }}</h3>
                        </div>
                        <div class="bb-sidebar-contact">
                            <ul>
                                <li>
                                    <a class="bb-btn-1" href="{{ url('/user/userprofile') }}" style="display: block;">
                                        {{ __('menu.profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="bb-btn-2" href="{{ url('/user/rootorders') }}" style="display: block;">
                                        {{__('menu.orders') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="bb-btn-1" href="{{ url('/user/rootoreturns') }}" style="display: block;">
                                        {{ __('menu.returns') }}
                                    </a>
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="bb-btn-1" style="display: block;">{{ __('menu.logout') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12 mb-24">
                <div class="bb-shop-pro-inner">
                    <div class="row mb-minus-24">
                        <div class="section-title bb-center">
                            <div class="section-detail" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="200">
                                <h2 class="bb-title">{{ __("names.returnOrder").':' }} {{ $order->order_id }}</h2>
                            </div>
                        </div>
                        {!! Form::model($order, ['route' => ['savecancelnorder', $order->id], 'method' => 'post']) !!}
                        <div class="bb-contact-wrap" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" style="margin-bottom: 24px;">
                            {!! Form::label('description', __('names.desc') )!!}
                            {!! Form::textarea('description', null) !!}
                        </div>
                        <div class="bb-login-button d-flex" style="justify-content: space-between;" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                            <button type="submit" class="bb-btn-2">
                                {{ __('buttons.save') }}
                            </button>
                            <a href="{{ url('/user/vieworder/'.$order->id) }}" class="bb-btn-1">
                                {{ __('buttons.cancel') }}
                            </a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css')
<style>

</style>
@endpush