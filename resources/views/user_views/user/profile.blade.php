@extends('layouts.app')

@section('title', __('menu.profile'))

@section('content')
    <div class="my-account-area ptb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-12">
                    <div class="mb-5">
                        @include('adminlte-templates::common.errors')
                        @include('flash_messages')
                    </div>
                    <div class="account-content">
                        <ul class="account-btns">
                            <li>
                                <a href="{{ url('/user/userprofile') }}" class="active">
                                    {{ __('menu.profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootorders') }}">
                                    {{__('menu.orders')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootoreturns') }}">
                                    {{ __('menu.returns') }}
                                </a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('menu.logout') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                        <div class="account-details tab-box" id="tab-1" style="display: block;">
                            <h3>{{ __('menu.userInfo') }}</h3>
                            @include('user_views.user.user_info_form')
                            <hr class="my-4" />
                            <h3>{{ __('auth.passwordEnter') }}</h3>
                            @include('user_views.user.change_password_form')
                        </div>
                        <div class="your-orders tab-box" id="tab-3" style="display: none;">
                            <h3>Your Orders</h3>
                            <div class="orders-table table table-responsive">
                                <table class="table border">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="order">
                                                #1357
                                            </td>
                                            <td class="date">
                                                October 31, 2022
                                            </td>
                                            <td class="status">
                                                Completed
                                            </td>
                                            <td class="total">
                                                $125.00 for 2 item
                                            </td>
                                            <td class="actions">
                                                <a href="#">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="order">
                                                #2468
                                            </td>
                                            <td class="date">
                                                October 31, 2022
                                            </td>
                                            <td class="status">
                                                Processing
                                            </td>
                                            <td class="total">
                                                $364.00 for 5 item
                                            </td>
                                            <td class="actions">
                                                <a href="#">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="order">
                                                #2366
                                            </td>
                                            <td class="date">
                                                October 31, 2022
                                            </td>
                                            <td class="status">
                                                Completed
                                            </td>
                                            <td class="total">
                                                $280.00 for 3 item
                                            </td>
                                            <td class="actions">
                                                <a href="#">View</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
