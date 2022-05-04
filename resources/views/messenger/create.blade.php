@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Messenger</h1>
            </div>
        </div>
    </div>
</section>
    <div class="content px-3">
        <div class="row px-3">
            @include('flash::message')
            <div class="clearfix"></div>
            <div class="card p-3 col-sm-2">
                <div class="card-body">
                    @include('messenger.users')
                </div>
            </div>
            <div class="card p-3 col-sm">
                <div class="card-body">
                    @include('messenger.table')
                </div>
            </div>
        </div>
    </div>
@endsection