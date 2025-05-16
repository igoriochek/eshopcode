@extends('layouts.app')

@section('content')
    <div class="container">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
    </div>
    <div class="container product-section">
        <div class="mb-4 text-uppercase">
            <h5>{{ __('menu.profile') }}</h5>
        </div>
        <div class="row">
            <div class="col">
                <div id="description" class="tabs tabs-simple tabs-simple-full-width-line tabs-product tabs-dark mb-2">
                    <ul class="nav nav-tabs justify-content-start mb-4" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active font-weight-bold text-3 text-uppercase py-2 px-3" href="#profile"
                                data-bs-toggle="tab" aria-selected="true" role="tab">
                                {{ __('menu.userInfo') }}
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-link-reviews font-weight-bold text-3 text-uppercase py-2 px-3"
                                href="#password" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
                                {{ __('auth.passwordEnter') }}
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-link-reviews font-weight-bold text-3 text-uppercase py-2 px-3"
                                href="#company" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
                                {{ __('names.companyInfo') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content p-0">
                        <div class="tab-pane px-0 active" id="profile" role="tabpanel">
                            @include('user_views.user.forms.user_info_form')
                        </div>
                        <div class="tab-pane px-0" id="password" role="tabpanel">
                            @include('user_views.user.forms.change_password_form')
                        </div>
                        <div class="tab-pane px-0" id="company" role="tabpanel">
                            @include('user_views.user.forms.company_info_form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
