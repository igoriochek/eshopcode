@extends('layouts.app')

@section('title', __('menu.profile'))

@section('content')
        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="mb-5">
                        @include('adminlte-templates::common.errors')
                        @include('flash_messages')
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-selected="true"><i class="fas fa-user"></i>{{ __('menu.profile') }}</a>
                                        <a class="nav-item nav-link" href="{{ url('/user/rootorders') }}" aria-selected="false"><i class="fas fa-shopping-basket"></i>{{__('menu.orders')}}</a>
                                        <a class="nav-item nav-link" href="{{ url('/user/rootoreturns') }}" aria-selected="false"><i class="fas fa-arrow-circle-left "></i>{{ __('menu.returns') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="nav-item nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fal fa-sign-out"></i>{{ __('menu.logout') }}
                                        </a>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel">
                                    <div class="col-lg-9">
                                        <div class="axil-dashboard-account">
                                            <div class="account-details-form">
                                                <div class="row">
                                                    <h3 class="col-12">{{ __('menu.userInfo') }}</h3>
                                                    @include('user_views.user.user_info_form')
                                                    <hr class="my-4" />
                                                    <h3 class="col-12">{{ __('auth.passwordEnter') }}</h3>
                                                    <div class="col-12">
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
                </div>
            </div>
        </div>
@endsection
