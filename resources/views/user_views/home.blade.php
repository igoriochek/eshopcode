@extends('layouts.app')

@section('content')
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
                    @auth
                        {{ __('You are now logged in as: ').Auth::user()->name }}<br/>
                    @endauth
                    {{ __('Language is: ').$lang }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
