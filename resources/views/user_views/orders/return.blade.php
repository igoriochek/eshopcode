@extends('layouts.app')

@section('title', __('names.returnOrder'))
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
                                <h4 class="small-title">{{ __('names.returnOrder') }}</h4>
                                {!! Form::model($order, [
                                    'route' => ['savereturnorder', $order->id],
                                    'method' => 'post',
                                    'class' => 'myaccount-form',
                                ]) !!}
                                <div class="myaccount-form-inner">
                                    <div class="single-input table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="50px"></th>
                                                    <th>{{ __('table.productId') }}</th>
                                                    <th>{{ __('table.productName') }}</th>
                                                    <th>{{ __('table.price') }}</th>
                                                    <th>{{ __('table.count') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderItems as $item)
                                                    <tr>
                                                        <td width="50px"
                                                            class="image-and-content d-flex align-items-center">
                                                            <div class="form-check">
                                                                {!! Form::checkbox('return_items[]', $item->product_id, false, [
                                                                    'class' => 'form-check-input mb-3',
                                                                    'style' => 'height: 33px',
                                                                ]) !!}
                                                            </div>
                                                        </td>
                                                        <td>{{ $item->product_id }}</td>
                                                        <td>{{ $item->product->name }}</td>
                                                        <td>
                                                            €{{ number_format($item->price_current, 2) }}
                                                        </td>
                                                        <td>{{ $item->count }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
