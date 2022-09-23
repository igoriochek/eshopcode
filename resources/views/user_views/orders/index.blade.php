@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.myOrders') ])

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="../">{{__('menu.home')}}</a></li>
                <li>{{ __('names.orders') }}</li>
            </ul>
        </div>
    </div>

    <div class="container margin_60">
        @include('flash::message')
        <div class="row">
            @if($orders)
                <div class="card">
                    <div class="table table-responsive">
                        <table class="table table-striped cart-list add_bottom_30" id="categories" >
                            <thead>
                                <tr>
                                    <th>{{__('table.orderId')}}</th>
                                    <th>{{__('table.user')}}</th>
                                    <th>{{__('table.status')}}</th>
                                    <th>{{__('table.sum')}}</th>
                                    <th>{{__('table.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->status->name }}</td>
                                    <td>{{ $item->sum }}€</td>
                                    <td width="120">
                                        <div class='btn-group'>
                                            <a href="{{ route('vieworder', [$item->id]) }}"
                                               class='btn btn-default btn-xs'>
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                {{__('names.noOrders')}}
            @endif
        </div>
    </div>

@endsection

