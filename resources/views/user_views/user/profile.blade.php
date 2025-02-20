@extends('layouts.app')

@section('title', __('menu.profile'))

@section('content')
<section class="main_content_area" style="padding-top: 0px;">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="mb-5">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li>
                                <a href="{{ url('/user/userprofile') }}" class="nav-link active">{{ __('menu.profile') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootorders') }}" class="nav-link">{{__('menu.orders') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootoreturns') }}" class="nav-link">{{ __('menu.returns') }}</a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">{{ __('menu.logout') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active">
                            <h3>{{ __('menu.userInfo') }}</h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        @include('user_views.user.user_info_form')
                                    </div>
                                </div>
                            </div>
                            <h3>{{ __('auth.passwordEnter') }}</h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        @include('user_views.user.change_password_form')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    .login {
        margin-bottom: 20px;
    }
</style>