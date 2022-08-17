@extends('layouts.app')

@section('content')
    @include('user_views.header', ['title' => __('names.cart')])
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5 order-sm-last order-lg-first">
                    <div class="row">
                        @include('flash::message')
                        <div class="clearfix"></div>
                        @if($cartItems)
                            <div class="card">
                                <div class="card-body p-0">
                                    @include('user_views.cart.table')
                                </div>
                            </div>
                        @else
                            {{__('names.emptyCart')}}
                        @endif
                        @if($cartItems)
                            <section>
                                <div>
                                    <div class="float-right">
                                        <a href="{{route('checkout')}}" class="btn btn-success">{{__('buttons.checkout')}}</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </section>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
