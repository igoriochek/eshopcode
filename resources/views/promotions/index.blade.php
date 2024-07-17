@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.promotions')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('promotions.create') }}" class="btn btn-primary float-end">
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
                @include('promotions.table')
                <div class="card-footer clearfix">
                    <div class="float-end"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

