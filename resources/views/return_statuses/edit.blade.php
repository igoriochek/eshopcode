@extends('layouts.app')

@section('content')
    <section class="content-header mt-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2>{{__('names.editReturnStatus')}}</h2>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($returnStatus, ['route' => ['returnStatuses.update', $returnStatus->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('return_statuses.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('returnStatuses.index') }}" class="btn btn-secondary">{{__('buttons.cancel')}}</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

<style>
    .btn.btn-primary {
        width: auto;
        padding: 0 30px;
        border-radius: 6px;
        display: inline-block;
        font-weight: 500;
        transition: .3s;
        height: 60px;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        line-height: 4;
        font-size: 14px;
    }
    
    .btn.btn-secondary {
        width: auto;
        padding: 0 30px;
        border-radius: 6px;
        display: inline-block;
        font-weight: 500;
        transition: .3s;
        height: 60px;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        line-height: 4;
        font-size: 14px;
    }
</style>