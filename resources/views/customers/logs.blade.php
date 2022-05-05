@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    User Logs
                </div>
                <div class="table table-responsive">
                    <table class="table" id="categories" data-order='[[ 4, "desc" ]]'>
                        <thead>
                        <tr>
                            <td>Id</td>
                            <td>User_Id</td>
                            <td>Email</td>
                            <td>Activity</td>
                            <td>Date</td>
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
