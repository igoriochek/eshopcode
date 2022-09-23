@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.returnItemDetails') ])

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.returnItemDetails')}}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('return_items.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
