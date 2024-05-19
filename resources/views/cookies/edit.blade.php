@extends('layouts.app')

@section('content')
    <section class="content-header mt-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2>{{__('names.editCookie')}}</h2>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($cookie, ['route' => ['cookies.update', $cookie->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('cookies.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('buttons.save'), ['class' => 'axil-btn btn-primary']) !!}
                <a href="{{ route('cookies.index') }}" class="axil-btn btn-secondary">{{__('buttons.cancel')}}</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
