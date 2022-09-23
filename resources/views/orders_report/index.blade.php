@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('reports.ordersReport') ])

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('reports.ordersReport')}}</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="card mb-4">
            @include('orders_report.filter')
        </div>
        <div class="card p-2">
            @include('orders_report.report')
        </div>
    </div>
@endsection

