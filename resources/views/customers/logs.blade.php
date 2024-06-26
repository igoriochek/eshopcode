@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 style="margin-bottom: 0px !important;">{{__('names.userLogs')}}</h5>
                </div>
                <div class="table-responsive">
                    <table class="table" id="categories" data-order='[[ 4, "desc" ]]'>
                        <thead>
                        <tr>
                            <td>Id</td>
                            <td>{{__('table.userId')}}</td>
                            <td>{{__('table.email')}}</td>
                            <td>{{__('table.activity')}}</td>
                            <td>{{__('table.date')}}</td>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($logs as $log)
                        <tr>
                            <td>{{$log->id}}</td>
                            <td>{{$log->user_id}}</td>
                            <td>{{$log->email}}</td>
                            <td>{{$log->activity}}</td>
                            <td>{{$log->created_at}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
