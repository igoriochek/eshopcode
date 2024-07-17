@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.cartDetails')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('carts.index') }}" class="btn btn-primary float-end">
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
                    @include('carts.show_fields')
                </div>
            </div>
        </div>
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.cartItems')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('cartItems.create', ['cart_id' => $cart->id]) }}" class="btn btn-primary float-end">
                        {{__('buttons.addNew')}}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('cart_items.table')
                </div>
            </div>
        </div>
    </div>
@endsection
