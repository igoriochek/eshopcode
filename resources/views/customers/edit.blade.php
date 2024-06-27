@extends('layouts.app')

@section('content')
    <section class="content-header mt-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{__('names.editCustomer')}}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('customers.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('buttons.save'), ['class' => 'axil-btn btn-primary']) !!}
                <a href="{{ route('customers.index') }}" class="axil-btn btn-secondary">{{__('buttons.cancel')}}</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
