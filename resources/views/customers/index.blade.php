@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.customers')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('customers.create') }}" class="btn btn-primary float-end">
                        {{__('buttons.addNew')}}
                    </a>
                    <a href="{{ route('customers.statistics') }}" class="btn btn-primary float-end">
                        {{__('buttons.showStatistics')}}
                    </a>
                    <a href="{{ route('customers.logs') }}" class="btn btn-primary float-end">
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
                    <div class="float-end"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

