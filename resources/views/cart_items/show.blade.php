@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{__('names.cartItemDetails')}}</h2>
                </div>
                <div class="col-sm-6">
                    <a class="axil-btn btn-primary float-right"
                       href="{{ route('cartItems.index') }}">
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
                    @include('cart_items.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
