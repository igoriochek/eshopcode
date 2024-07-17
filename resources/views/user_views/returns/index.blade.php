@extends('layouts.app')

@section('title', __('menu.returns'))

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
                                <a href="{{ url('/user/rootorders') }}">
                                    {{__('menu.orders')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootoreturns') }}" class="active">
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
                            <h3>{{ __('names.returns') }}</h3>
                            <div class="orders-table table table-responsive">
                                <table class="table border">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">{{ __('table.date') }}</th>
                                            <th scope="col">{{ __('table.status') }}</th>
                                            <th scope="col">{{ __('table.sum') }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($returns as $return)
                                            <tr>
                                                <td class="order">
                                                    {{ $return->id }}
                                                </td>
                                                <td class="date">
                                                    {{ $return->created_at->format('M d, Y') }}
                                                </td>
                                                <td class="status">
                                                    {{ __("status.".$return->status->name) }}
                                                </td>
                                                <td class="total">
                                                    €{{ number_format($return->sum, 2) }}
                                                </td>
                                                <td class="actions">
                                                    <a href="{{ route('viewreturn', [$return->id]) }}" class="btn btn-primary btn-xs">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-muted" colspan="5">
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
@endsection

