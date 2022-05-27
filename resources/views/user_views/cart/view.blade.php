@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>{{__('names.cart')}}</h1>
            </div>
        </div>
    </div>
</section>

<section>

    <div class="content px-3">

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
    </div>
</section>


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

@endsection

