@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                @include('flash::message')
                @include('adminlte-templates::common.errors')
                <div class="d-flex justify-content-between align-items-center mt-1">
                    <h2>{{ __('names.editProductSauce').': '.$productSauce->name }}</h2>
                </div>
            </div>
            <div class="col-12 mt-40 p-4" style="border: 1px solid #e3e3e3; box-shadow: 1px 1px 10px #f5f5f5">
                {!! Form::model($productSauce, ['route' => ['productSauce.update', $productSauce->id], 'method' => 'patch', 'class' => 'row']) !!}
                    @include('product_sauce.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

