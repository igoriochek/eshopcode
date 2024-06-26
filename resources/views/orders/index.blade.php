@extends('layouts.app')

@section('content')
    <section class="content-header mt-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{__('names.orders')}}</h2>
                </div>
                <div class="col-sm-6">
                    <a class="axil-btn btn-primary float-right"
                       href="{{ route('orders.create') }}">
                        {{__('buttons.addNew')}}
                    </a>
                    <a class="axil-btn btn-primary float-right"
                       href="{{ route('customers.statistics') }}">
                        {{__('buttons.showStatistics')}}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('orders.table')

                <div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

