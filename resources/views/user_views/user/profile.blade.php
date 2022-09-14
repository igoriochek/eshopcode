@extends('layouts.app')

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-20 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                     <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="account-detail-tab"
                                           href="{{url('/user/userprofile')}}" role="tab" aria-controls="account-detail"
                                           aria-selected="true"><i
                                                class="fi-rs-user mr-10"></i>{{__('forms.accountDetails')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab"  href="{{ url('/user/rootorders') }}"
                                           aria-selected="false"><i
                                                class="fi-rs-shopping-bag mr-10"></i>{{__('menu.orders')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab"
                                           href="{{url('/user/rootoreturns')}}" role="tab" aria-controls="account-detail"
                                           aria-selected="true"> <i
                                                class="fi fi-rs-arrow-left mr-10"></i>{{__('menu.returns')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            @include('adminlte-templates::common.errors')
                            @include('flash::message')
                            <div class="tab-pane" id="account-detail"
                            >
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{__('forms.accountDetails')}}</h5>
                                    </div>
                                    <div class="card-body">
                                        {!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch']) !!}
                                        <form method="post" name="enq">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    {!! Form::label('code', __('forms.name').':' )!!}
                                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    {!! Form::label('email', __('forms.email').':') !!}
                                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('street', __('forms.street').':') !!}
                                                    {!! Form::text('street', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('house_flat', __('forms.house_flat').':') !!}
                                                    {!! Form::text('house_flat', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('post_index', __('forms.post_index').':') !!}
                                                    {!! Form::text('post_index', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('city', __('forms.city').':') !!}
                                                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('phone_number', __('forms.phone_number').':') !!}
                                                    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-md-12">
                                                    {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
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
@endsection
