@extends('layouts.app')

@section('title', __("names.returnOrder"))
@section('parentTitle', __('names.order').' '.$order->order_id)
@section('parentUrl', url('/user/vieworder/'.$order->id))

@section('content')
{{-- <div class="my-account-area ptb-70">
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
    <h3 class="mb-2">{{ __("names.returnOrder").':' }} {{ $order->order_id }}</h3>
    {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
    <div class="orders-table table table-responsive mb-4">
        <table class="table border cart-table">
            <thead>
                <tr>
                    <th scope="col">{{ __('table.productId') }}</th>
                    <th scope="col">{{ __('table.productName') }}</th>
                    <th scope="col">{{ __('table.price') }}</th>
                    <th scope="col">{{ __('table.count') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderItems as $item)
                <tr>
                    <td class="image-and-content d-flex align-items-center">
                        <div class="form-check">
                            {!! Form::checkbox("return_items[]", $item->product_id, false, ['class' => 'form-check-input']) !!}
                        </div>
                    </td>
                    <td>{{ $item->product_id }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>€{{ number_format($item->price_current, 2) }}</td>
                    <td>{{ $item->count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
</div> --}}

<section class="contact-us pb-120 pt-20">
    <div class="container">
        <div class="profile__inner p-relative">
            <div class="profile__shape">
                <img class="profile__shape-1" src="{{ asset('template/img/login/laptop.png') }}" alt="">
                <img class="profile__shape-2" src="{{ asset('template/img/login/man.png') }}" alt="">
                <img class="profile__shape-3" src="{{ asset('template/img/login/shape-1.png') }}" alt="">
                <img class="profile__shape-4" src="{{ asset('template/img/login/shape-2.png') }}" alt="">
                <img class="profile__shape-5" src="{{ asset('template/img/login/shape-3.png') }}" alt="">
                <img class="profile__shape-6" src="{{ asset('template/img/login/shape-4.png') }}" alt="">
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <div class="job-overview-wrap bg-light-subtle p-5 sticky-sidebar rounded-custom mt-5 mt-lg-0">
                        <nav>
                            <div class="nav nav-tabs tp-tab-menu flex-column" id="profile-tab" role="tablist">
                                <a class="nav-link" href="{{ url('/user/userprofile') }}">
                                    <span>
                                        <i class="fa-regular fa-address-card"></i>
                                    </span>
                                    {{ __('menu.profile') }}
                                </a>
                                <a class="nav-link active" href="{{ url('/user/rootorders') }}">
                                    <span>
                                        <i class="fa-solid fa-box-open"></i>
                                    </span>
                                    {{ __('menu.orders') }}
                                </a>
                                <a class="nav-link" href="{{ url('/user/rootoreturns') }}">
                                    <span>
                                        <i class="fa-solid fa-right-left"></i>
                                    </span>
                                    {{ __('menu.returns') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="nav-link" style="width: 100%; display: flex; justify-content: start; align-items: center;" type="submit" onclick="event.preventDefault(); return confirm('{{ __('messages.confirmLogout') }}');">
                                        <span>
                                            <i class="fa-solid fa-right-from-bracket" style="margin-right: 4px;"></i>
                                        </span>
                                        {{ __('menu.logout') }}
                                    </button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-8 col-lg-8">
                    <div class="profile__tab-content">
                        <div class="tab-content" id="profile-tabContent">
                            <div class="tab-pane fade active show">
                                <div class="register-wrap p-5 bg-white shadow rounded-custom position-relative aos-init aos-animate">
                                    <h3 class="profile__info-title">{{ __('names.returnOrder') }}</h3>
                                    <div class="profile__info-content">
                                        {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
                                        <div class="profile__ticket table-responsive mb-35">
                                            <table class="table table-start">
                                                <thead>
                                                    <tr>
                                                        <th width="30px" scope="col"></th>
                                                        <th scope="col">{{ __('table.productId') }}</th>
                                                        <th scope="col">{{ __('table.productName') }}</th>
                                                        <th scope="col">{{ __('table.price') }}</th>
                                                        <th scope="col">{{ __('table.count') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orderItems as $item)
                                                    <tr>
                                                        <td width="30px" data-info="check" class="">
                                                            <div class="form-check">
                                                                {!! Form::checkbox("return_items[]", $item->product_id, false, ['class' => 'form-check-input']) !!}
                                                            </div>
                                                        </td>
                                                        <td data-info="productId">{{ $item->product_id }}</td>
                                                        <td data-info="productName">{{ $item->product->name }}</td>
                                                        <td data-info="price">€{{ number_format($item->price_current, 2) }}</td>
                                                        <td data-info="count">{{ $item->count }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xxl-12">
                                            <div class="tp-profile-input-box">
                                                <div class="tp-profile-input-title">
                                                    {!! Form::label('description', __('names.desc') )!!}
                                                </div>
                                                <div class="tp-contact-input">
                                                    {!! Form::textarea('description', null, ['class' => "form-control"]) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12 d-flex align-items-center flex-wrap gap-3 mt-3">
                                            <div class="profile__btn">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('buttons.save') }}
                                                </button>
                                            </div>
                                            <div class="profile__btn">
                                                <a href="{{ url('/user/vieworder/'.$order->id) }}" class="btn btn-primary">
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
        </div>
    </div>
</section>
@endsection

<style>
    .nav-tabs .nav-link.active {
        background-color: #fafafa !important;
        border-color: rgb(225, 226, 227) !important;

    }

    .nav-tabs .nav-link {
        border-radius: 0.3125rem !important;
        border: 1px solid rgb(225, 226, 227);
    }

    .nav-tabs {
        --bs-nav-tabs-border-color: rgba(17, 24, 39, 0) !important;
    }

    .table-start th, .table-start td {
        text-align: start;
        vertical-align: middle;
    }

    .table-start th {
        font-weight: bold;
    }
</style>