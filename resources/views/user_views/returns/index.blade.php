@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <div class="col-lg-10 m-auto">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="tab-pane account" id="orders">
                        @if($returns)
                            <div class="card">
                                <div class="card-header">
                                    @include('flash::message')
                                    <h3 class="mb-0"> {{__('names.myReturns')}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{{__('names.return')}} ID</th>
                                                    <th>{{__('table.user')}}</th>
                                                    <th>{{__('table.status')}}</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($returns as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ __("status." . $item->status->name) }}</td>
                                                    <td width="120">
                                                        <div class='btn-group'>
                                                            <a href="{{ route('viewreturn', [$item->id]) }}"
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
                            {{__('names.noReturns')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

