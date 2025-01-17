@extends('layouts.app')

@section('title', __('names.return').' '.$return->id)
@section('parentTitle', __('menu.returns'))
@section('parentUrl', url('/user/rootreturns'))

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
                                    <a class="bb-btn-1" href="{{ url('/user/rootorders') }}" style="display: block;">
                                        {{__('menu.orders') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="bb-btn-2" href="{{ url('/user/rootoreturns') }}" style="display: block;">
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
                                <h2 class="bb-title">{{ __('names.return').':' }} {{ $return->id }}</h2>
                                <div class="col-12 col-sm-6 d-flex justify-content-center" style="column-gap: 10px; row-gap: 5px; width: 100%;">
                                    <div>{{ __('table.status').': '.__("status.".$return->status->name) }}</div>
                                    <div>{{ __('table.sum').': €' }}{{ number_format($return->sum, 2) }}</div>
                                    <div>{{ __('table.date').': '.$return->created_at->format('M d, Y') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="bb-cart-table" style="margin-bottom: 40px;" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <table>
                                <thead>
                                    <tr>
                                        <th>{{ __('table.productName') }}</th>
                                        <th>{{ __('table.price') }}</th>
                                        <th>{{ __('table.count') }}</th>
                                        <th>{{ __('table.productComplex') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($returnItems as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>€{{ number_format($item->price_current, 2) }}</td>
                                        <td>{{ $item->count }}</td>
                                        <td>
                                            <div>
                                                @if($item->isComplexProduct == 1)
                                                <span>{{ __('table.yes') }}</span>
                                                @else
                                                <span>{{ __('table.no') }}</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="section-title bb-center">
                            <div class="section-detail" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="600">
                                <h2 class="bb-title">{{ __('names.orderHistory') }}</h2>
                            </div>
                        </div>
                        <div class="bb-cart-table" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                            @include('orders.history_table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection