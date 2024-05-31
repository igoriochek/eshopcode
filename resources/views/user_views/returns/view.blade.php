@extends('layouts.app')

@section('title', __('names.return') . ' ' . $return->id)
@section('parentTitle', __('menu.returns'))
@section('parentUrl', url('/user/rootreturns'))

@section('content')
    <div class="account-page-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/userprofile') }}">
                                {{ __('menu.profile') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/rootorders') }}">
                                {{ __('menu.orders') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/user/rootoreturns') }}">
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
                            <div class="myaccount-orders">
                                <h4 class="small-title">{{ __('names.returnDetails') }}</h4>
                                <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex flex-wrap" style="column-gap: 25px">
                                        <p><span>{{ __('table.status') . ': ' }}</span>{{ __('status.' . $return->status->name) }}
                                        </p>
                                        <p><span>{{ __('table.sum') . ': ' }}</span>€{{ number_format($return->sum, 2) }}
                                        </p>
                                        <p><span>{{ __('table.date') . ': ' }}</span>{{ $return->created_at->format('M d, Y') }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center flex-wrap gap-3 mt-1">
                                        <div class="btn-group">
                                            <a href="{{ route('vieworder', [$return->order_id]) }}"
                                                class="btn btn-dark btn-primary-hover rounded-0">
                                                {{ __('names.order') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content myaccount-tab-content mt-4">
                        <div class="tab-pane fade active show">
                            <div class="myaccount-orders">
                                <h4 class="small-title">{{ __('names.returnItems') }}</h4>
                                <div class="table-responsive">
                                    @include('user_views.returns.tables.return_item_table')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content myaccount-tab-content mt-4">
                        <div class="tab-pane fade active show">
                            <div class="myaccount-orders">
                                <h4 class="small-title">{{ __('names.orderHistory') }}</h4>
                                <div class="table-responsive">
                                    @include('orders.history_table')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
