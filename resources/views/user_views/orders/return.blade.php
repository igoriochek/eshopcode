@extends('layouts.app')

@section('title', __("names.returnOrder"))
@section('parentTitle', __('names.order').' '.$order->order_id)
@section('parentUrl', url('/user/vieworder/'.$order->id))

@section('content')
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
                        {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
                        <div class="bb-cart-table" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" style="margin-bottom: 40px;">
                            <table>
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
                                                {!! Form::checkbox("return_items[]", $item->product_id, false, ['class' => 'form-check-input', 'id' => 'return_items_' . $item->product_id]) !!}
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
                        <div class="bb-contact-wrap" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600" style="margin-bottom: 24px;">
                            {!! Form::label('description', __('names.desc') )!!}
                            {!! Form::textarea('description', null) !!}
                        </div>
                        <div class="bb-login-button d-flex" style="justify-content: space-between;" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
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
    .form-check-input[type="checkbox"] {
        border: 1px solid #eee;
        border-radius: 5px;
        overflow: hidden;
    }

    .form-check-input:checked {
        background-color: #6c7fd8;
    }
</style>
@endpush