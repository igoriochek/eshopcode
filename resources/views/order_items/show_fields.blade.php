<!-- Order Id Field -->
<div class="col-sm-12">
    {!! Form::label('order_id', __('table.orderId').':') !!}
    <p>{{ $orderItem->order_id }}</p>
</div>

<!-- Product Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_id',  __('table.product').':') !!}
    <p>{{ $orderItem->product->name }}</p>
</div>

<!-- Price Current Field -->
<div class="col-sm-12">
    {!! Form::label('price_current',  __('table.priceCurrent').':')!!}
    <p>{{ $orderItem->price_current }}</p>
</div>

<!-- Count Field -->
<div class="col-sm-12">
    {!! Form::label('count',  __('table.count').':') !!}
    <p>{{ $orderItem->count }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at',  __('table.created_at').':') !!}
    <p>{{ $orderItem->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at',  __('table.updated_at').':') !!}
    <p>{{ $orderItem->updated_at }}</p>
</div>

<!-- Complex Product Field -->
<div class="col-sm-12">
    {!! Form::label('productComplex',  __('table.productComplex').':') !!}
    @if($orderItem->isComplexProduct == 1)
        <p>{{ __('table.yes') }}</p>
    @else
        <p>{{ __('table.no') }}</p>
    @endif
</div>

