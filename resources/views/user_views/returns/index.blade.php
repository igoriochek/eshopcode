@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.myReturns') ])

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="../">{{__('menu.home')}}</a></li>
                <li>{{ __('names.returns') }}</li>
            </ul>
        </div>
    </div>

    <div class="container margin_60">
        @include('flash::message')
        <div class="row">
            @if($returns)
                <div class="card">
                    <div class="table table-responsive">
                        <table class="table table-striped cart-list add_bottom_30" id="categories">
                            <thead>
                                <tr>
                                    <th>{{__('table.returnId')}}</th>
                                    <th>{{__('table.user')}}</th>
                                    <th>{{__('table.status')}}</th>
                                    <th>{{__('table.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($returns as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->status->name }}</td>
                                    <td width="120">
                                        <div class='btn-group'>
                                            <a href="{{ route('viewreturn', [$item->id]) }}"
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
                {{__('names.noReturns')}}
            @endif
        </div>
    </div>


@endsection

