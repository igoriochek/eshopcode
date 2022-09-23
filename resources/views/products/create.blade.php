@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.createProduct') ])

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{__('names.createProduct')}}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'products.store', 'files' => true]) !!}

            <div class="card-body">

                <div class="row">
                    @include('products.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('products.index') }}" class="btn btn-default">{{__('buttons.cancel')}}</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
