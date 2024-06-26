@extends('layouts.app')

@section('content')
    <section class="content-header mt-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.customers')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="axil-btn btn-primary float-right"
                       href="{{ route('customers.create') }}">
                        {{__('buttons.addNew')}}
                    </a>
                    <a class="axil-btn btn-primary float-right"
                       href="{{ route('customers.statistics') }}">
                        {{__('buttons.showStatistics')}}
                    </a>
                    <a class="axil-btn btn-primary float-right"
                       href="{{ route('customers.logs') }}">
                        {{__('buttons.showLogs')}}
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
                @include('customers.table')

                <div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

