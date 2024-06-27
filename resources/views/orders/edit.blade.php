@extends('layouts.app')

@section('content')
    <section class="content-header mt-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2>{{__('names.editOrder')}}</h2>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('orders.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('buttons.save'), ['class' => 'axil-btn btn-primary']) !!}
                <a href="{{ route('orders.index') }}" class="axil-btn btn-secondary">{{__('buttons.cancel')}}</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <section class="content-header mt-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{__('names.orderHistory')}}</h2>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('orders.history_table')
                </div>
            </div>
        </div>
    </div>
@endsection
