@extends('layouts.app')

@section('content')
    @include('page_header', [
        'secondPageLink' => 'userprofile',
        'secondPageName' => __('menu.profile'),
        'hasThirdPage' => false
    ])
    <div class="container py-5">
        <div class="page-content pt-20 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-12 m-auto">
                        <div class="row">
                            <div class="col-md-3 pe-md-2 pe-0">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex active" id="account-detail-tab" data-bs-toggle="tab"
                                               href="#account-detail" role="tab" aria-controls="account-detail"
                                               aria-selected="true">
                                                <i class="fi-rs-user mr-10"></i>
                                                {{__('forms.profileSettings')}}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex" id="password-settings-tab" data-bs-toggle="tab"
                                               href="#password-settings" role="tab" aria-controls="password-settings"
                                               aria-selected="false">
                                                <i class="fi-rs-settings-sliders mr-10"></i>
                                                {{__('forms.passwordSettings')}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                @include('adminlte-templates::common.errors')
                                @include('flash::message')
                                <div class="tab-content account dashboard-content mt-4 mt-md-0 ps-0 ps-md-3">
                                    <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>{{__('forms.editProfile')}}</h5>
                                            </div>
                                            <div class="divider-2 mt-10 mb-10"></div>
                                            <div class="card-body">
                                                {!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch']) !!}
                                                <form method="post" name="enq">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            {!! Form::label('code', __('forms.name') )!!}
                                                            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            {!! Form::label('email', __('forms.email')) !!}
                                                            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            {!! Form::label('street', __('forms.street')) !!}
                                                            {!! Form::text('street', $user->street, ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-3 col-sm-6">
                                                            {!! Form::label('house_flat', __('forms.house_flat')) !!}
                                                            {!! Form::text('house_flat', $user->house_flat, ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-3 col-sm-6">
                                                            {!! Form::label('post_index', __('forms.post_index')) !!}
                                                            {!! Form::text('post_index', $user->post_index, ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            {!! Form::label('city', __('forms.city')) !!}
                                                            {!! Form::text('city', $user->city, ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            {!! Form::label('phone_number', __('forms.phone_number')) !!}
                                                            {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="d-flex justify-content-center w-100">
                                                            {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary mt-3 col-xl-4 col-lg-5 col-md-6 col-12 ']) !!}
                                                        </div>
                                                    </div>
                                                </form>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="password-settings" role="tabpanel" aria-labelledby="password-settings-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>{{__('forms.editPassword')}}</h5>
                                            </div>
                                            <div class="divider-2 mt-10 mb-10"></div>
                                            <div class="card-body">
                                                {!! Form::model($user, ['route' => ['changePassword'], 'method' => 'post']) !!}
                                                <form method="post" name="enq">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>{{__('forms.current_password')}}</label>
                                                            {!! Form::password('current_password', ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>{{__('forms.new_password')}}</label>
                                                            {!! Form::password('new_password', ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>{{__('forms.confirm_password')}}</label>
                                                            {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="d-flex justify-content-center w-100">
                                                            {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary mt-3 col-xl-4 col-lg-5 col-md-6 col-12 ']) !!}
                                                        </div>
                                                    </div>
                                                </form>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
