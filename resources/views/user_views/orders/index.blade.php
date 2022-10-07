@extends('layouts.app')

@section('content')
    <div class="page-content pt-20 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab"
                                           href="{{url('/user/userprofile')}}" role="tab" aria-controls="account-detail"
                                        ><i
                                                class="fi-rs-user mr-10"></i>{{__('forms.accountDetails')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="orders-tab" href="{{ url('/user/rootorders') }}"
                                           aria-selected="false" aria-selected="true"><i
                                                class="fi-rs-shopping-bag mr-10"></i>{{__('menu.orders')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab"
                                           href="{{url('/user/rootoreturns')}}" role="tab"
                                           aria-controls="account-detail"
                                           aria-selected="true"> <i
                                                class="fi fi-rs-arrow-left mr-10"></i>{{__('menu.returns')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-pane account">
                                <div class="tab-pane" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    @if($orders)
                                        <div class="card">
                                            <div class="card-header">
                                                @include('flash::message')
                                                <h3 class="mb-0"> {{__('names.myOrders')}}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table table-responsive">
                                                    <table class="table" id="categories">
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
            </div>
        </div>
    </div>
@endsection

