@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>{{ $product->name }} [View Product]</h1>
            </div>
        </div>
    </div>
</section>

<section>
<div class="row m-2">
    <div class="col-sm-12">
        <div class="product">
            <div class="name">Name: {{ $product->name }}</div>
            <div class="price">Price: {{ $product->price }}</div>
            <div class="count">Count: {{ $product->count }}</div>
            <div class="description">Description: {{ $product->description }}</div>
            <div>
                {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="submit" value="addToCart">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</section>

@endsection

