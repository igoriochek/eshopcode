@extends('layouts.app')

@section('title', __("names.returnOrder"))
@section('parentTitle', __('names.order').' '.$order->order_id)
@section('parentUrl', url('/user/vieworder/'.$order->id))

@section('content')
<section class="main_content_area" style="padding-top: 0px;">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="mb-5">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li>
                                <a href="{{ url('/user/userprofile') }}" class="nav-link">{{ __('menu.profile') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootorders') }}" class="nav-link active">{{__('menu.orders') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootoreturns') }}" class="nav-link">{{ __('menu.returns') }}</a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">{{ __('menu.logout') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="contact_message form">
                        <h3>{{ __("names.returnOrder").':' }} {{ $order->order_id }}</h3>
                        {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{-- __('names.checkReturn') --}}</th>
                                        <th>{{ __('table.productId') }}</th>
                                        <th>{{ __('table.productName') }}</th>
                                        <th>{{ __('table.price') }}</th>
                                        <th>{{ __('table.count') }}</th>
                                        <th>{{ __('table.productComplex') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderItems as $item)
                                    <tr>
                                        <td>
                                            <div>
                                                {!! Form::checkbox("return_items[]", $item->product_id, false, ['class' => 'custom-checkbox', 'id' => 'return_items_' . $item->product_id]) !!}
                                                <label for="return_items_{{ $item->product_id }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $item->product_id }}</td>
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
                        <div class="contact_textarea">
                            {!! Form::label('description', __('names.desc') )!!}
                            {!! Form::textarea('description', null, ['class' => 'form-control2']) !!}
                        </div>
                        <div class="d-flex" style="column-gap: 10px;">
                            <button type="submit" class="save-button">
                                {{ __('buttons.save') }}
                            </button>
                            <a href="{{ url('/user/vieworder/'.$order->id) }}" class="cancel-button">
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
    .custom-checkbox {
        width: 15px !important;
        height: 13px !important;
    }
</style>
@endpush