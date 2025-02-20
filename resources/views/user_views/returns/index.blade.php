@extends('layouts.app')

@section('title', __('menu.returns'))

@section('content')
<section class="main_content_area" style="padding-top: 0px;">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="mb-5">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li>
                                <a href="{{ url('/user/userprofile') }}" class="nav-link">{{ __('menu.profile') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootorders') }}" class="nav-link">{{__('menu.orders') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootoreturns') }}" class="nav-link active">{{ __('menu.returns') }}</a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">{{ __('menu.logout') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active">
                            <h3>{{ __('names.returns') }}</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>{{ __('table.date') }}</th>
                                            <th>{{ __('table.status') }}</th>
                                            <th>{{ __('table.sum') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($returns as $return)
                                        <tr>
                                            <th>
                                                {{ $return->id }}
                                            </th>
                                            <td>
                                                {{ $return->created_at->format('M d, Y') }}
                                            </td>
                                            <td>
                                                {{ __("status.".$return->status->name) }}
                                            </td>
                                            <td>
                                                €{{ number_format($return->sum, 2) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('viewreturn', [$return->id]) }}" class='bb-btn-2'>
                                                    {{ __('buttons.view') }}
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5">
                                                {{ __('names.noReturns') }}
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
</section>
@endsection