@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                @include('flash::message')
                @include('adminlte-templates::common.errors')
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ __('menu.freeAccessories') }}</h2>
                    <a href="{{ route('freeAccessory.create') }}" class="btn btn-primary">
                        {{ __('buttons.addNew') }}
                    </a>
                </div>
            </div>
            <div class="col-12 mt-40" style="border: 1px solid #e3e3e3; box-shadow: 1px 1px 10px #f5f5f5">
                @include('free_accessory.table')
            </div>
        </div>
    </div>
@endsection


