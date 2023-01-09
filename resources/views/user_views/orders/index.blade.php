@extends('layouts.app')

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow">
                    <i class="fi-rs-home mr-5"></i>
                    {{ __('menu.home') }}
                </a>
                <span></span>
                <a href="{{ url("/user/rootorders") }}">
                    {{ __('menu.orders') }}
                </a>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="col-lg-10 m-auto">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="tab-pane account" id="orders">
                        @if($orders)
                            <div class="card">
                                <div class="card-header">
                                    @include('flash::message')
                                    <h3 class="mb-0"> {{__('names.myOrders')}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{{__('names.order')}} ID</th>
                                                    <th>{{__('table.status')}}</th>
                                                    <th>{{__('table.sum')}}</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ __("status." . $item->status->name) }}</td>
                                                    <td>{{ number_format($item->sum,2) }} €</td>
                                                    <td width="120">
                                                        <div class='btn-group'>
                                                            <a href="{{ route('vieworder', [$item->id]) }}"
                                                               class='btn-small d-block'>
                                                                {{__('names.view')}}
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{__('names.noOrders')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

