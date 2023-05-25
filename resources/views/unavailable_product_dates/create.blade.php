@extends('layouts.app')

@section('content')
    <div class="page-navigation">
        <div class="container">
            <a href="{{ url('/') }}">
                {{ __('menu.home') }}
            </a>
            <i class="fa-solid fa-angle-right"></i>
            <a href="{{ route('unavailable_product_dates.index') }}">
                {{ __('menu.unavailableProductDates') }}
            </a>
            <i class="fa-solid fa-angle-right"></i>
            <span>
                {{ __('names.createUnavailableProductDate') }}
            </span>
        </div>
    </div>
    <div class="container">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-4 mt-3 d-flex flex-md-row flex-column justify-content-md-between">
                    <h3 style="font-family: 'Times New Roman', sans-serif">{{__('names.createUnavailableProductDate')}}</h3>
                    <a href="{{ route('unavailable_product_dates.index') }}" class="btn btn-primary orders-returns-primary-button">
                        <i class="fa-solid fa-chevron-left me-1 fs-6"></i>
                        {{ __('buttons.back') }}
                    </a>
                </div>
                <div class="row bg-white mx-md-0 p-3">
                    @include('unavailable_product_dates.forms.store_form')
                </div>
            </div>
        </div>
    </div>
@endsection

