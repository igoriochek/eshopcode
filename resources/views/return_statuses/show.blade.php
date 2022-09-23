@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.returnStatusDetails') ])

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.returnStatusDetails')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('returnStatuses.index') }}">
                        {{__('buttons.back')}}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('return_statuses.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
