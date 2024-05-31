@extends('layouts.app')

@section('title', __('menu.profile'))

@section('content')
    <div class="account-page-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/user/userprofile') }}">
                                {{ __('menu.profile') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/rootorders') }}">
                                {{ __('menu.orders') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/rootoreturns') }}">
                                {{ __('menu.returns') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                    <div class="tab-content myaccount-tab-content">
                        <div class="tab-pane fade active show">
                            <div class="myaccount-details">
                                <h5 class="mb-4">{{ __('menu.userInfo') }}</h5>
                                @include('user_views.user.user_info_form')
                            </div>
                            <div class="myaccount-details">
                                <h5 class="mb-4 mt-5">{{ __('auth.passwordEnter') }}</h5>
                                @include('user_views.user.change_password_form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
