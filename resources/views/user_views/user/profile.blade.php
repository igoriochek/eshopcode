@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('menu.userInfo') ])

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="../">{{__('menu.home')}}</a></li>
                <li>{{__('forms.userProfile')}}</li>
            </ul>
        </div>
    </div>

    <div class="margin_60 container">
        <div id="tabs" class="tabs">
            <nav>
                <ul>
                    <li><a href="#section-1" class="icon-profile"><span>{{__('forms.profileSettings')}}</span></a>
                    </li>
                    <li><a href="#section-2" class="icon-settings"><span>{{__('forms.passwordSettings')}}</span></a>
                    </li>
                </ul>
            </nav>
            <div class="content">
                @include('adminlte-templates::common.errors')
                @include('flash::message')
                <section id="section-1">
                    {!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <h4>{{__('forms.yourProfile')}}</h4>
                            <ul id="profile_summary">
                                <li>{{__('table.userId')}} <span>{{ $user->id }}</span></li>
                                <li>{{__('forms.name')}} <span>{{ $user->name }}</span></li>
                                <li>{{__('forms.phone_number')}} <span>{{ $user->phone_number }}</span></li>
                                <li>{{__('forms.email')}} <span>{{ $user->email }}</span></li>
                                <li>{{__('forms.city')}} <span>{{ $user->city }}</span></li>
                                <li>{{__('forms.street')}} <span>{{ $user->street }}</span></li>
                                <li>{{__('forms.house_flat')}} <span>{{ $user->house_flat }}</span></li>
                                <li>{{__('forms.post_index')}} <span>{{ $user->post_index }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End row -->
                    <div class="divider"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4>{{__('forms.editProfile')}}</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('forms.name')}}</label>
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('forms.phone_number')}}</label>
                                {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('forms.email')}} </label>
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>{{__('forms.editAdress')}}</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('forms.city')}}</label>
                                {!! Form::text('city', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('forms.street')}}</label>
                                {!! Form::text('street', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('forms.house_flat')}}</label>
                                {!! Form::text('house_flat', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('forms.post_index')}}</label>
                                {!! Form::text('post_index', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <hr>
                    {!! Form::submit(__('buttons.save'), ['class' => 'btn_1 green']) !!}

                    {!! Form::close() !!}

                </section>
                <!-- End section 1 -->
                <section id="section-2">
                    {!! Form::model($user, ['route' => ['changePassword'], 'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <h4>{{__('forms.changePassword')}}</h4>
                            <div class="form-group">
                                <label>{{__('forms.current_password')}}</label>
                                {!! Form::password('current_password', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{__('forms.new_password')}}</label>
                                {!! Form::password('new_password', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{__('forms.confirm_password')}}</label>
                                {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <hr>
                    {!! Form::submit(__('buttons.save'), ['class' => 'btn_1 green']) !!}
                    {!! Form::close() !!}
                </section>
                <!-- End section 2 -->
            </div>
            <!-- End content -->
        </div>
        <!-- End tabs -->
    </div>
    <!-- End container -->

    <script src="{{asset('js/tabs.js')}}"></script>
    <script>
        new CBPFWTabs(document.getElementById('tabs'));
    </script>

@endsection
