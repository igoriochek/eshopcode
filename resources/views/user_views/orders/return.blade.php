@extends('layouts.app')

@section('title', __("names.returnOrder"))
@section('parentTitle', __('names.order').' '.$order->order_id)
@section('parentUrl', url('/user/vieworder/'.$order->id))

@section('content')
<div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="mb-5">
                        @include('adminlte-templates::common.errors')
                        @include('flash_messages')
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link" href="{{ url('/user/userprofile') }}" aria-selected="false"><i class="fas fa-user"></i>{{ __('menu.profile') }}</a>
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="true"><i class="fas fa-shopping-basket"></i>{{__('menu.orders')}}</a>
                                        <a class="nav-item nav-link" href="{{ url('/user/rootoreturns') }}" aria-selected="false"><i class="fas fa-arrow-circle-left "></i>{{ __('menu.returns') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="nav-item nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fal fa-sign-out"></i>{{ __('menu.logout') }}
                                        </a>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <h3 class="col-12">{{ __("names.returnOrder").':' }} {{ $order->order_id }}</h3>
                                        {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
                                            <div class="table-responsive mb-5">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 10px; padding: 0">{{-- __('names.checkReturn') --}}</th>
                                                            <th scope="col">{{ __('table.productId') }}</th>
                                                            <th scope="col">{{ __('table.productName') }}</th>
                                                            <th scope="col">{{ __('table.price') }}</th>
                                                            <th scope="col">{{ __('table.count') }}</th>
                                                            <th scope="col">{{ __('table.productComplex') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($orderItems as $item)
                                                            <tr>
                                                                <td class="image-and-content d-flex align-items-center">
                                                                    <div class="form-check">
                                                                        {!! Form::checkbox("return_items[]", $item->product_id, false, ['class' => 'form-check-input', 'id' => 'return_items_' . $item->product_id]) !!}
                                                                        <label for="return_items_{{ $item->product_id }}"></label>
                                                                    </div>
                                                                </td>
                                                                <td scope="row">{{ $item->product_id }}</td>
                                                                <td>{{ $item->product->name }}</td>
                                                                <td>€{{ number_format($item->price_current, 2) }}</td>
                                                                <td>{{ $item->count }}</td>
                                                                <td>
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
                                                <input type="submit" class="axil-btn" data-loading-text="Loading..." value="{{ __('buttons.save') }}">
                                                </input>
                                                <a href="{{ url('/user/vieworder/'.$order->id) }}" class="axil-btn view-btn" style="padding: 13px 30px;">
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
            </div>
        </div>
@endsection



@push('css')
    <style>
        /*  */
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