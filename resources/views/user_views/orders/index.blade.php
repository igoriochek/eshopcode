@extends('layouts.app')

@section('title', __('menu.orders'))

@section('content')
<section class="section-shop padding-b-50">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="mb-5">
                @include('adminlte-templates::common.errors')
                @include('flash_messages')
            </div>
            <div class="col-lg-3 col-12 mb-24">
                <div class="bb-shop-wrap">
                    <div class="bb-sidebar-block">
                        <div class="bb-sidebar-title">
                            <h3>{{ __('names.yourAccount') }}</h3>
                        </div>
                        <div class="bb-sidebar-contact">
                            <ul>
                                <li>
                                    <a class="bb-btn-1" href="{{ url('/user/userprofile') }}" style="display: block;">
                                        {{ __('menu.profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="bb-btn-2" href="{{ url('/user/rootorders') }}" style="display: block;">
                                        {{__('menu.orders') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="bb-btn-1" href="{{ url('/user/rootoreturns') }}" style="display: block;">
                                        {{ __('menu.returns') }}
                                    </a>
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="bb-btn-1" style="display: block;">{{ __('menu.logout') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12 mb-24">
                <div class="bb-shop-pro-inner">
                    <div class="row mb-minus-24">
                        <div class="section-title bb-center">
                            <div class="section-detail" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="200">
                                <h2 class="bb-title">{{ __('names.orders') }}</h2>
                            </div>
                        </div>
                        <div class="bb-cart-table" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <table>
                                <thead>
                                    <tr>
                                        <th>{{ __('names.order').' ID' }}</th>
                                        <th>{{ __('table.date') }}</th>
                                        <th>{{ __('table.status') }}</th>
                                        <th>{{ __('table.sum') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                    <tr>
                                        <th>
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
                                            <a href="{{ route('vieworder', [$order->id]) }}" class='bb-btn-2'>
                                                {{ __('buttons.view') }}
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">
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
</section>
@endsection
