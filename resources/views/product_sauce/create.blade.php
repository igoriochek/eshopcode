@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.product_sauce')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('productSauce.index') }}">
                        {{__('buttons.back')}}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>

        {!! Form::open(['route' => 'productSauce.store']) !!}

        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('product_sauce.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('productSauce.index') }}" class="btn btn-default">{{__('buttons.cancel')}}</a>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
