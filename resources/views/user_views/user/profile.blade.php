@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>User profile</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')
        @include('flash::message')

        <div class="card">

            {!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">


{{--            $table->string("street")->nullable(true);
            $table->string("house_flat")->nullable(true);
            $table->string("post_index")->nullable(true);
            $table->string("city")->nullable(true);--}}
                    <!-- Code Field -->

                    <div class="form-group col-sm-6">
                        {!! Form::label('code', __('forms.name').':' )!!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('email', __('forms.email').':') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('street', __('forms.street').':') !!}
                        {!! Form::text('street', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('house_flat', __('forms.house_flat').':') !!}
                        {!! Form::text('house_flat', null, ['class' => 'form-control']) !!}
                    </div>


                    <div class="form-group col-sm-6">
                        {!! Form::label('post_index', __('forms.post_index').':') !!}
                        {!! Form::text('post_index', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('city', __('forms.city').':') !!}
                        {!! Form::text('city', null, ['class' => 'form-control']) !!}
                    </div>



                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
