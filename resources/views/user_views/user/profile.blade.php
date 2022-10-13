@extends('layouts.app')

@section('content')
    <div class="container py-10">
    <div class="dashboard-content">
        <div class="container">
            <div class="dashboard-settings">
                <div class="dashboard-tabs-menu">
                    <ul class="nav justify-content-center" role="tablist">
                        <li>
                            <a class="nav-link active" id="account-detail-tab" data-bs-toggle="tab"
                               href="#account-detail" role="tab" aria-controls="account-detail"
                               aria-selected="true">
                                <i class="fi-rs-user mr-10"></i>{{__('forms.profileSettings')}}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" id="password-settings-tab" data-bs-toggle="tab"
                               href="#password-settings" role="tab" aria-controls="password-settings"
                               aria-selected="false">
                                <i class="fi-rs-settings-sliders mr-10"></i>{{__('forms.passwordSettings')}}
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Dashboard Tabs End -->
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        @include('adminlte-templates::common.errors')
                        @include('flash::message')
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                {!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch']) !!}
                                <form method="post" name="enq">
                                    <div class="dashboard-content-box">
                                        <h5 class="dashboard-content-box__title pb-3">{{__('forms.editProfile')}}</h5>
                                        <div class="row gy-4">
                                            <div class="col-md-6">
                                                <label class="form-label-02">{{__('forms.name')}}</label>
                                                {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label-02">{{__('forms.email')}}</label>
                                                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label-02">{{__('forms.street')}}</label>
                                                {!! Form::text('street', $user->street, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label-02">{{__('forms.house_flat')}}</label>
                                                {!! Form::text('house_flat', $user->house_flat, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label-02">{{__('forms.post_index')}}</label>
                                                {!! Form::text('post_index', $user->post_index, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label-02">{{__('forms.city')}}</label>
                                                {!! Form::text('city', $user->city, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label-02">{{__('forms.phone_number')}}</label>
                                                {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-settings__btn">
                                        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary btn-hover-secondary']) !!}
                                    </div>
                                </form>
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane fade" id="password-settings" role="tabpanel" aria-labelledby="password-settings-tab">
                                {!! Form::model($user, ['route' => ['changePassword'], 'method' => 'post']) !!}
                                <form method="post" name="enq">
                                    <div class="dashboard-content-box">
                                        <h5 class="dashboard-content-box__title pb-3">{{__('forms.editPassword')}}</h5>
                                        <div class="row gy-4">
                                            <div class="col-md-12">
                                                <label class="form-label-02">{{__('forms.current_password')}}</label>
                                                {!! Form::password('current_password', ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label-02">{{__('forms.new_password')}}</label>
                                                {!! Form::password('new_password', ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label-02">{{__('forms.confirm_password')}}</label>
                                                {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-settings__btn">
                                        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary btn-hover-secondary']) !!}
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
@endsection
