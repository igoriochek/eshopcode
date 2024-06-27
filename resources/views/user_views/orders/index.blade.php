@extends('layouts.app')

@section('title', __('menu.orders'))

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
                                        <a class="nav-item nav-link" href="{{ url('/user/userprofile') }}" aria-selected="false"><i class="fas fa-user"></i>{{ __('menu.profile') }}</a>
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="true"><i class="fas fa-shopping-basket"></i>{{__('menu.orders')}}</a>
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
                                <div class="tab-pane fade show active" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <h3>{{ __('names.orders') }}</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">{{ __('names.order').' ID' }}</th>
                                                        <th scope="col">{{ __('table.date') }}</th>
                                                        <th scope="col">{{ __('table.status') }}</th>
                                                        <th scope="col">{{ __('table.sum') }}</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($orders as $order)
                                                        <tr>
                                                            <th scope="row">
                                                                {{ $order->order_id }}
                                                            </th>
                                                            <td>
                                                                {{ $order->created_at->format('M d, Y') }}
                                                            </td>
                                                            <td>
                                                                {{ __("status.".$order->status->name) }}
                                                            </td>
                                                            <td>
                                                                €{{ number_format($order->sum, 2) }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('vieworder', [$order->id]) }}" class='axil-btn view-btn'>
                                                                    {{ __('buttons.view') }}
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" style="text-align: left;">
                                                                {{ __('names.noOrders') }}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
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

