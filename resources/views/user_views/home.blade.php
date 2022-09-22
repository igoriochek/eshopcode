@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.Dashboard') ])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}<br/>
                    Language is {{$lang}}
                    User Home page, authorised
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
