@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{__('names.createCustomer')}}</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::open(['route' => 'customers.store']) !!}
            <div class="card-body">
                <div class="row">
                    @include('customers.fields')
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('customers.index') }}" class="btn btn-primary">{{__('buttons.cancel')}}</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
