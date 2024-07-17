@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{__('names.editCartItem')}}</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::model($cartItem, ['route' => ['cartItems.update', $cartItem->id], 'method' => 'patch']) !!}
            <div class="card-body">
                <div class="row">
                    @include('cart_items.fields')
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('cartItems.index') }}" class="btn btn-primary">{{__('buttons.cancel')}}</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
