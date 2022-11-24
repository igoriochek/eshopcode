@extends('layouts.app')

@section('content')
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ __('menu.profile') }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ __('menu.profile') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->
    <section class="my__account--section section--padding">
        <div class="container">
            @include('adminlte-templates::common.errors')
            @include('flash::message')
            <div class="my__account--section__inner border-radius-10 d-flex">
                <div class="account__left--sidebar">
                    <h2 class="account__content--title mb-20">{{__('menu.profile')}}</h2>
                    <ul class="account__menu nav nav-tabs justify-content-start" role="tablist">
                        <li class="account__menu--list nav-item mb-3 me-4 me-lg-0" role="presentation">
                            <a class="active" href="#profile" data-bs-toggle="tab" aria-selected="true" role="tab">
                                {{ __('menu.userInfo') }}
                            </a>
                        </li>
                        <li class="account__menu--list nav-item" role="presentation">
                            <a href="#password" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
                                {{ __('auth.passwordEnter') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="account__wrapper">
                    <div class="account__content">
                        <div class="tab-content p-0">
                            <div class="tab-pane px-0 active" id="profile" role="tabpanel">
                                <div class="auth-form">
                                    {!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch', 'class' => 'auth-form-container px-0']) !!}
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            {!! Form::label('code', __('forms.name'), ['class' => 'checkout__input--label'] )!!}
                                            {!! Form::text('name', $user->name, ['class' => 'checkout__input--field border-radius-5']) !!}
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            {!! Form::label('email', __('forms.email'), ['class' => 'checkout__input--label'] ) !!}
                                            {!! Form::text('email', $user->email, ['class' => 'checkout__input--field border-radius-5']) !!}
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            {!! Form::label('street', __('forms.street'), ['class' => 'checkout__input--label'] ) !!}
                                            {!! Form::text('street', $user->street, ['class' => 'checkout__input--field border-radius-5']) !!}
                                        </div>
                                        <div class="col-md-3 col-6 mb-20">
                                            {!! Form::label('house_flat', __('forms.house_flat'), ['class' => 'checkout__input--label'] ) !!}
                                            {!! Form::text('house_flat', $user->house_flat, ['class' => 'checkout__input--field border-radius-5']) !!}
                                        </div>
                                        <div class="col-md-3 col-6 mb-20">
                                            {!! Form::label('post_index', __('forms.post_index'), ['class' => 'checkout__input--label'] ) !!}
                                            {!! Form::text('post_index', $user->post_index, ['class' => 'checkout__input--field border-radius-5']) !!}
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            {!! Form::label('city', __('forms.city'), ['class' => 'checkout__input--label'] ) !!}
                                            {!! Form::text('city', $user->city, ['class' => 'checkout__input--field border-radius-5']) !!}
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            {!! Form::label('phone_number', __('forms.phone_number'), ['class' => 'checkout__input--label'] ) !!}
                                            {!! Form::text('phone_number', $user->phone_number, ['class' => 'checkout__input--field border-radius-5']) !!}
                                        </div>
                                        <div class="d-flex justify-content-center mt-5">
                                            <button type="submit" class="primary__btn">
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
                                        <div class="col-md-4 col-12 mb-20">
                                            {!! Form::label('current_password', __('forms.current_password'), ['class' => 'checkout__input--label'] ) !!}
                                            {!! Form::password('current_password', ['class' => 'checkout__input--field border-radius-5']) !!}
                                            @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-12">
                                            {!! Form::label('new_password', __('forms.new_password'), ['class' => 'checkout__input--label'] ) !!}
                                            {!! Form::password('new_password', ['class' => 'checkout__input--field border-radius-5']) !!}
                                            @error('new_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-12">
                                            {!! Form::label('new_password_confirmation', __('forms.confirm_password'), ['class' => 'checkout__input--label'] ) !!}
                                            {!! Form::password('new_password_confirmation', ['class' => 'checkout__input--field border-radius-5']) !!}
                                            @error('new_password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-center mt-4">
                                            <button type="submit" class="primary__btn">
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
        </div>
    </section>
@endsection
