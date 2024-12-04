@extends('layouts.app')

@section('title', __("names.returnOrder"))
@section('parentTitle', __('names.order').' '.$order->order_id)
@section('parentUrl', url('/user/vieworder/'.$order->id))

@section('content')
<div class="my-account pb-5">
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
                    <h3 class="contact-page-title">{{ __("names.returnOrder").':' }} {{ $order->order_id }}</h3>
                    {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
                    <div class="table-responsive mb-5">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center th-col" style="width: 10px; padding: 0">{{-- __('names.checkReturn') --}}</th>
                                    <th scope="col" class="text-center th-col">{{ __('table.productId') }}</th>
                                    <th scope="col" class="text-center th-col" style="text-transform: none !important;">{{ __('table.productName') }}</th>
                                    <th scope="col" class="text-center th-col">{{ __('table.price') }}</th>
                                    <th scope="col" class="text-center th-col">{{ __('table.count') }}</th>
                                    <th scope="col" class="text-center th-col" style="text-transform: none !important;">{{ __('table.productComplex') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderItems as $item)
                                <tr>
                                    <td class="text-center">
                                        <div class="form-check">
                                            {!! Form::checkbox("return_items[]", $item->product_id, false, ['class' => 'form-check-input', 'id' => 'return_items_' . $item->product_id]) !!}
                                            <label for="return_items_{{ $item->product_id }}"></label>
                                        </div>
                                    </td>
                                    <td class="text-center" scope="row">{{ $item->product_id }}</td>
                                    <td class="text-center">{{ $item->product->name }}</td>
                                    <td class="text-center">€{{ number_format($item->price_current, 2) }}</td>
                                    <td class="text-center">{{ $item->count }}</td>
                                    <td class="text-center">
                                        <div>
                                            @if($item->isComplexProduct == 1)
                                            <span>{{ __('table.yes') }}</span>
                                            @else
                                            <span>{{ __('table.no') }}</span>
                                            @endif
                                        </div>
                                    </td>
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
</div>
@endsection



@push('css')
<style>
    .th-col {
        background-color: #0090f0 !important;
        border-color: transparent !important;
        color: #fff !important;
        text-transform: none !important;
    }

    .btn .btn-primary {
        font-size: 1.4rem !important;
        border: none !important;
        line-height: 2.5rem !important;
        box-shadow: none !important;
        padding: 0.5rem 2rem !important;
        border-radius: 5px !important;
        display: inline-block !important;
        background: #0090f0 !important;
        color: #fff !important;
        text-transform: capitalize !important;
    }

    .form-check {
        height: 64px;
    }

    @media only screen and (max-width: 767px) {
        .form-check {
            height: 112px;
        }
    }
</style>
@endpush