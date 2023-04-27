@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            @include('flash::message')
            @include('adminlte-templates::common.errors')
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.productDetails')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('products.index') }}">
                        {{__('buttons.back')}}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('products.show_fields')
                </div>
            </div>
        </div>
    </div>
    @if ($product->hasSizes)
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>{{ __('menu.productSizes') }}</h2>
                        @if (count($product->sizesPrices) < $productSizesCount)
                            <a href="{{ route('addProductSizePriceView', $product->id) }}" class="btn btn-primary">
                                {{ __('buttons.addNew') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-12 mt-40" style="border: 1px solid #e3e3e3; box-shadow: 1px 1px 10px #f5f5f5">
                    @include('products.tables.product_size_price_table')
                </div>
            </div>
        </div>
    @endif
@endsection
