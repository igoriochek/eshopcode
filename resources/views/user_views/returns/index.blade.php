@extends('layouts.app')

@section('content')
{{--    <div class="page-header breadcrumb-wrap">--}}
{{--        <div class="container">--}}
{{--            <div class="breadcrumb">--}}
{{--                <a href="{{ url('/') }}" rel="nofollow">--}}
{{--                    <i class="fi-rs-home mr-5"></i>--}}
{{--                    {{ __('menu.home') }}--}}
{{--                </a>--}}
{{--                <span></span>--}}
{{--                <a href="{{ url("/user/rootoreturns") }}">--}}
{{--                    {{ __('menu.returns') }}--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="container py-5">--}}
{{--        <div class="col-lg-10 m-auto">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="tab-pane account" id="orders">--}}
{{--                        @if($returns)--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header">--}}
{{--                                    @include('flash::message')--}}
{{--                                    <h3 class="mb-0"> {{__('names.myReturns')}}</h3>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="table-responsive">--}}
{{--                                        <table class="table">--}}
{{--                                            <thead>--}}
{{--                                                <tr>--}}
{{--                                                    <th>{{__('names.return')}} ID</th>--}}
{{--                                                    <th>{{__('table.status')}}</th>--}}
{{--                                                    <th></th>--}}
{{--                                                </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                            @foreach($returns as $item)--}}
{{--                                                <tr>--}}
{{--                                                    <td>{{ $item->id }}</td>--}}
{{--                                                    <td>{{ __("status." . $item->status->name) }}</td>--}}
{{--                                                    <td width="120">--}}
{{--                                                        <div class='btn-group'>--}}
{{--                                                            <a href="{{ route('viewreturn', [$item->id]) }}"--}}
{{--                                                               class='btn-small d-block'>--}}
{{--                                                                {{__('names.view')}}--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            {{__('names.noReturns')}}--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow">
                    <i class="fi-rs-home mr-5"></i>
                    {{ __('menu.home') }}
                </a>
                <span></span>
                <a href="{{ url("/user/rootoreturns") }}">
                    {{ __('menu.returns') }}
                </a>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="col-lg-12 m-auto px-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="w-100">
                        @include('flash::message')
                    </div>
                    <h3 class="m-0 p-0 mb-35 mt-4">{{ __('names.myReturns') }}</h3>
                </div>
                <div class="col-12 d-flex flex-column overflow-scroll">
                    <div style="min-width: 900px; box-shadow: 1px 1px 10px #efefef">
                        <div class="d-flex gap-2 px-4 fs-6 fw-bold text-dark" style="border: 1px solid lightgray; border-radius: 8px 8px 0 0">
                            <div class="d-flex align-items-center py-3" style="width: 15%">{{ __('names.return') }} ID</div>
                            <div class="d-flex align-items-center py-3" style="width: 15%">{{ __('table.status') }}</div>
                            <div class="d-flex align-items-center py-3" style="width: 35%">{{ __('table.description') }}</div>
                            <div class="d-flex align-items-center py-3" style="width: 15%">{{ __('table.sum') }}</div>
                            <div class="d-flex align-items-center py-3" style="width: 20%">{{ __('table.date') }}</div>
                            <div class="d-flex align-items-center py-3" style="width: 110px"></div>
                        </div>
                        @include('user_views.returns.tables.returns_table')
                    </div>
                </div>
                @if (count($returns) > 0)
                    <div class="pagination-area mt-30 mb-20 d-flex justify-content-center">
                        {{ $returns->onEachSide(1)->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

