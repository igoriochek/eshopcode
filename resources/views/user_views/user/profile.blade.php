@extends('layouts.app')

@section('content')
    @include('header', ['title' => __('menu.profile')])
    <section class="product-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    @include('adminlte-templates::common.errors')
                    @include('flash::message')
                    <div class="card">
                        {!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch']) !!}
                        <div class="card-body">
                            <div class="row">
                                {{--
                                $table->string("street")->nullable(true);
                                $table->string("house_flat")->nullable(true);
                                $table->string("post_index")->nullable(true);
                                $table->string("city")->nullable(true);
                                $table->string("phone_number")->nullable(true);
                                --}}
                                <!-- Code Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('code', __('forms.name').':' )!!}
                                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('email', __('forms.email').':') !!}
                                    {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('street', __('forms.street').':') !!}
                                    {!! Form::text('street', $user->street, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('house_flat', __('forms.house_flat').':') !!}
                                    {!! Form::text('house_flat', $user->house_flat, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('post_index', __('forms.post_index').':') !!}
                                    {!! Form::text('post_index', $user->post_index, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('city', __('forms.city').':') !!}
                                    {!! Form::text('city', $user->city, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('phone_number', __('forms.phone_number').':') !!}
                                    {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- Change Password Form -->
                    <div class="card mt-4">
                        {!! Form::model($user, ['route' => ['changePassword'], 'method' => 'post']) !!}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    {!! Form::label('current_password', __('forms.current_password').':' )!!}
                                    {!! Form::password('current_password', ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('new_password', __('forms.new_password').':') !!}
                                    {!! Form::password('new_password', ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('new_password_confirmation', __('forms.confirm_password').':') !!}
                                    {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
