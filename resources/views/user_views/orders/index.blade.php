@extends('layouts.app')

@section('title', __('menu.orders'))

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
                                <a href="{{ url('/user/userprofile') }}">
                                    {{ __('menu.profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootorders') }}" class="active">
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
                        <div class="your-orders">
                            <h3>{{ __('names.orders') }}</h3>
                            <div class="orders-table table table-responsive">
                                <table class="table border">
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
                                                <td class="order">
                                                    {{ $order->order_id }}
                                                </td>
                                                <td class="date">
                                                    {{ $order->created_at->format('M d, Y') }}
                                                </td>
                                                <td class="status">
                                                    {{ __("status.".$order->status->name) }}
                                                </td>
                                                <td class="total">
                                                    €{{ number_format($order->sum, 2) }}
                                                </td>
                                                <td class="actions">
                                                    <a href="{{ route('vieworder', [$order->id]) }}" class='btn btn-default btn-xs'>
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-muted" colspan="5">
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
@endsection

