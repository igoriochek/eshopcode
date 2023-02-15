@extends('layouts.app')

@section('content')
    @include('header', ['title' => __('names.orders')])
    <div class="container mt-3 mb-5">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="row bg-white mx-md-0 py-3 px-0">
                    <h3 class="my-3" style="font-family: 'Times New Roman', sans-serif">
                        {{ __('names.orders') }}
                    </h3>
                    <div class="table table-responsive mt-1">
                        <table class="table table-striped table-bordered mb-3" id="categories">
                            <thead style="background: #e7e7e7;">
                            <tr>
                                <th>{{__("names.order")}} ID</th>
                                <th>{{__('table.date')}}</th>
                                <th>{{__('table.status')}}</th>
                                <th>{{__('table.sum')}}</th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $item)
                                <tr>
                                    <td class="ps-3 text-start align">{{ $item->id }}</td>
                                    <td class="ps-3 text-start">{{ $item->created_at->format('Y-m-d H:m') }}</td>
                                    <td class="ps-3 text-start">{{ __("status." . $item->status->name) }}</td>
                                    <td class="ps-3 text-start">{{ number_format($item->sum,2) }} €</td>
                                    <td class="text-start" width="140">
                                        <div class='btn-group w-100 d-flex justify-content-center align-items-center'>
                                            <a href="{{ route('vieworder', [$item->id]) }}"
                                               class='btn btn-primary orders-returns-primary-button'>
                                                <i class="far fa-eye me-1"></i>
                                                {{ __('buttons.details') }}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="ps-3">>{{__('names.noOrders')}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

