@extends('layouts.app')

@section('content')
    <section class="content-header mt-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{__('names.products')}}</h2>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('products.create') }}">
                        {{__('buttons.addNew')}}
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
                @include('products.table')

                <div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

<style>
    .btn.btn-primary {
        width: auto;
        padding: 0 30px;
        border-radius: 6px;
        display: inline-block;
        font-weight: 500;
        transition: .3s;
        height: 60px;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        line-height: 4;
        font-size: 14px;
    }
</style>
