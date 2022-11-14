@extends('layouts.app')

@section('content')
    @include('header', ['title' => __('menu.profile')])
    <div class="container">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="mb-3 mt-5">
            <h2 style="font-family: 'Times New Roman', sans-serif">{{ __('menu.profile') }}</h2>
        </div>
        <div class="col bg-white py-3 auth-form mb-5">
            <div id="description" class="tabs tabs-simple tabs-simple-full-width-line tabs-product tabs-dark mb-2">
                <ul class="nav nav-tabs justify-content-start mb-0" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active py-3 ps-0 pe-3" href="#profile" data-bs-toggle="tab" aria-selected="true" role="tab">
                            {{ __('names.userInfo') }}
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link-reviews py-3 ps-3 pe-0" href="#password" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
                            {{ __('auth.passwordEnter') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content p-0 pt-4">
                    <div class="tab-pane px-0 active" id="profile" role="tabpanel">
                        <div class="auth-form">
                            {!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch', 'class' => 'auth-form-container px-0']) !!}
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12 mb-3">
                                    {!! Form::label('code', __('forms.name') )!!}
                                    <span class="text-alert">*</span>
                                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12 mb-3">
                                    {!! Form::label('email', __('forms.email')) !!}
                                    <span class="text-alert">*</span>
                                    {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12 mb-3">
                                    {!! Form::label('street', __('forms.street')) !!}
                                    {!! Form::text('street', $user->street, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-3 col-sm-6 mb-3">
                                    {!! Form::label('house_flat', __('forms.house_flat')) !!}
                                    {!! Form::text('house_flat', $user->house_flat, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-3 col-sm-6 mb-3">
                                    {!! Form::label('post_index', __('forms.post_index')) !!}
                                    {!! Form::text('post_index', $user->post_index, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6 col-sm-12 mb-3">
                                    {!! Form::label('city', __('forms.city')) !!}
                                    {!! Form::text('city', $user->city, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6 col-sm-12 mb-3">
                                    {!! Form::label('phone_number', __('forms.phone_number')) !!}
                                    {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control']) !!}
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="submit" class="col-sm-3 col-md-4 col-sm-12 py-3 auth-button text-light" data-loading-text="Loading...">
                                        {{ __('buttons.save') }}
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="tab-pane px-0" id="password" role="tabpanel">
                        <div class="auth-form">
                            {!! Form::model($user, ['route' => ['changePassword'], 'method' => 'post', 'class' => 'auth-form-container px-0']) !!}
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12 mb-3">
                                    {!! Form::label('current_password', __('forms.current_password') )!!}
                                    <span class="text-alert">*</span>
                                    {!! Form::password('current_password', ['class' => 'form-control']) !!}
                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-sm-12 mb-3">
                                    {!! Form::label('new_password', __('forms.new_password')) !!}
                                    <span class="text-alert">*</span>
                                    {!! Form::password('new_password', ['class' => 'form-control']) !!}
                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-sm-12 mb-3">
                                    {!! Form::label('new_password_confirmation', __('forms.confirm_password')) !!}
                                    <span class="text-alert">*</span>
                                    {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
                                    @error('new_password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="submit" class="col-sm-3 col-md-4 col-sm-12 py-3 auth-button text-light" data-loading-text="Loading...">
                                        {{ __('buttons.save') }}
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
