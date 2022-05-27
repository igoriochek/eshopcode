@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>{{__('names.returns')}}</h1>
            </div>
        </div>
    </div>
</section>

<section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        @if($returns)
            <div class="card">
                <div class="card-body p-0">
                    <div class="table table-responsive">
                        <table class="table" id="categories">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{__('table.user')}}</th>
                                <th>{{__('table.status')}}</th>
                                <th> </th>
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
            </div>
        @else
            {{__('names.noReturns')}}
        @endif
    </div>
</section>

@endsection

