@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.cookieDetails')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('cookies.index') }}" class="btn btn-primary float-end">
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
                    @include('cookies.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
