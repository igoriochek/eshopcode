@extends('layouts.app')

@section('content')
    <div class="page-navigation">
        <div class="container">
            <a href="{{ url('/') }}">
                {{ __('menu.home') }}
            </a>
            <i class="fa-solid fa-angle-right"></i>
            <span>
                {{ __('menu.unavailableProductDates') }}
            </span>
        </div>
    </div>
    <div class="container">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-md-4 mb-5 mt-3 d-flex flex-md-row flex-column justify-content-md-between">
                    <h3 style="font-family: 'Times New Roman', sans-serif">{{__('names.unavailableProductDates')}}</h3>
                    <a href="{{ route('unavailable_product_dates.create') }}" class="btn btn-primary orders-returns-primary-button">
                        <i class="fa-solid fa-plus me-1 fs-6"></i>
                        {{ __('buttons.addNew') }}
                    </a>
                </div>
                <div class="row bg-white mx-md-0 p-3">
                    <div class="table table-responsive">
                        @include('unavailable_product_dates.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

