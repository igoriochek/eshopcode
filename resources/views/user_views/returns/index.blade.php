@extends('layouts.app')

@section('title', __('menu.returns'))

@section('content')
<div class="my-account pb-5">
    <div class="container">
        <div class="row">
            <div class="mb-5">
                @include('adminlte-templates::common.errors')
                @include('flash_messages')
            </div>
            <div class="col-12">
                <h3 class="title">{{ __('names.yourAccount') }}</h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="{{ url('/user/userprofile') }}">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-user"></i>
                            </span>
                            <h4 class="sub-title">
                                {{ __('menu.profile') }}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="{{ url('/user/rootorders') }}">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-shopping-basket"></i>
                            </span>
                            <h4 class="sub-title">
                                {{__('menu.orders')}}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="icon">
                                <i class="fas fa-arrow-circle-left " style="color: #0b88ee;"></i>
                            </span>
                            <h4 class="sub-title" style="color: black;">
                                {{ __('menu.returns') }}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12">
                <div class="log-out-btn text-center">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-dark3 my-5">{{ __('menu.logout') }}</a>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <hr class="my-4" />
                    <h3 class="contact-page-title">{{ __('names.returns') }}</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center th-col">ID</th>
                                    <th scope="col" class="text-center th-col">{{ __('table.date') }}</th>
                                    <th scope="col" class="text-center th-col">{{ __('table.status') }}</th>
                                    <th scope="col" class="text-center th-col">{{ __('table.sum') }}</th>
                                    <th scope="col" class="text-center th-col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($returns as $return)
                                <tr>
                                    <th class="text-center" scope="row">
                                        {{ $return->id }}
                                    </th>
                                    <td class="text-center">
                                        {{ $return->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="text-center">
                                        {{ __("status.".$return->status->name) }}
                                    </td>
                                    <td class="text-center">
                                        €{{ number_format($return->sum, 2) }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('viewreturn', [$return->id]) }}" class='btn btn-dark3'>
                                            {{ __('buttons.view') }}
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" style="text-align: left;">
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
@endsection

@push('css')
<style>
    .th-col {
        background-color: #0090f0 !important;
        border-color: transparent !important;
        color: #fff !important;
        text-transform: capitalize !important;
    }
</style>
@endpush