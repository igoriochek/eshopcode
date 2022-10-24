@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'rootoreturns',
    'secondPageName' => __('names.returns'),
    'hasThirdPage' => false
])

    <div class="dashboard-content py-10">
        <div class="container">
            @if($returns)
                <div class="dashboard-purchase-history">
                    <div class="dashboard-table table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="id">{{__('names.order')}} ID</th>
                                <th class="status">{{__('table.status')}}</th>
                                <th class="action"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($returns as $item)
                                <tr>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">{{__('names.return')}} ID</div>
                                        <div class="dashboard-table__text">{{ $item->id }}</div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">{{__('table.status')}}</div>
                                        <div
                                            class="dashboard-table__text">{{ __("status." . $item->status->name) }}</div>
                                    </td>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">{{__('table.action')}}</div>
                                        <div class="dashboard-table__text">
                                            <a href="{{ route('viewreturn', [$item->id]) }}"><i class="far fa-eye"></i>
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

