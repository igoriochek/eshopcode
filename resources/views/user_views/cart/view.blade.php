@extends('layouts.app')

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/home" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{__('names.home')}}</a>
                <span></span> {{__('names.cart')}}
            </div>
        </div>
    </div>
    @if($cartItems)
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">{{__('names.cart')}}</h1>
            </div>
        </div>
        @include('flash::message')
        @include('user_views.cart.table')
    </div>
    @else
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">{{__('names.emptyCart')}}</h1>
            </div>
        </div>
    @endif
@endsection

