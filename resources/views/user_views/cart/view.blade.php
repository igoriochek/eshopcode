@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>[View Cart]</h1>
            </div>
        </div>
    </div>
</section>

<section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        @if(isset($cartItems->product))
            <div class="card">
                <div class="card-body p-0">
                    @include('user_views.cart.table')
                </div>
            </div>
        @else
            your basket is empty
        @endif
    </div>
</section>

@endsection

