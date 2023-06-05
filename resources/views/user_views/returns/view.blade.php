@extends('layouts.app')

@section('content')
    <div class="page-navigation">
        <div class="container">
            <a href="{{ url('/') }}">
                {{ __('menu.home') }}
            </a>
            <i class="fa-solid fa-angle-right"></i>
            <a href="{{ url("/user/rootoreturns") }}">
                {{ __('menu.returns') }}
            </a>
            <i class="fa-solid fa-angle-right"></i>
            <span>
                {{ $return->id ?? '' }}
            </span>
        </div>
    </div>
    <div class="container">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12 d-flex flex-column gap-4">
                <div class="row">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between">
                        <div class="mb-2 mb-md-0">
                            <h3 class="mt-3 mb-1" style="font-family: 'Times New Roman', sans-serif">
                                {{__('names.return')}}: {{ $return->id }}
                            </h3>
                            <span class="text-muted">
                                {{__('names.returnStatus')}}: {{ __("status." .$return->status->name) }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row bg-white mx-md-0 p-3">
                    <h5 class="my-2">{{ __('names.products') }}</h5>
                    <div class="table table-responsive">
                        <table class="table table-striped table-bordered my-3">
                            <thead style="background: #e7e7e7;">
                                <tr>
                                    <th class="px-3">{{__('table.productName')}}</th>
                                    <th class="px-3">{{__('table.price')}}</th>
                                    <th class="px-3">{{__('table.count')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($returnItems as $item)
                                    <tr>
                                        <td class="px-3">
                                            {{ $item->product->name }}
                                            @if ($item->rental_start_date && $item->days)
                                                <div class="d-flex flex-column flex-md-row gap-md-3 gap-1 mt-2" style="color: #444">
                                                    <div class="d-flex flex-column" style="line-height: 22px">
                                                        <span style="color: #555">{{ __('forms.startDate') }}:</span>
                                                        <b>{{ $item->rental_start_date->format('Y-m-d') }}</b>
                                                    </div>
                                                    <div class="d-flex flex-column" style="line-height: 22px">
                                                        <span style="color: #555">{{ __('forms.selectedDays') }}:</span>
                                                        @if ($item->days == 1)
                                                            <b>{{ __('names.oneDay') }}</b>
                                                        @elseif ($item->days == 2)
                                                            <b>{{ __('names.twoDays') }}</b>
                                                        @elseif ($item->days == 3)
                                                            <b>{{ __('names.threeDays') }}</b>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-3">{{ number_format($item->price_current,2) }} €</td>
                                        <td class="px-3">{{ $item->rental_start_date && $item->days ? '-' : $item->count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row bg-white mx-md-0 p-3">
                    <h5 class="my-2">{{ __('names.orderHistory') }}</h5>
                    @include('orders.history_table')
                </div>
            </div>
        </div>
    </div>
@endsection

