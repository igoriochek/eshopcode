<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('table.user').':') !!}
    <p>[{{ $returnItem->user_id }}] {{ $returnItem->user->name }}</p>
</div>

<!-- Product Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_id', __('table.product').':') !!}
    <p>{{ $returnItem->product->name }}</p>
</div>

<!-- Price Current Field -->
<div class="col-sm-12">
    {!! Form::label('price_current',  __('table.priceCurrent').':') !!}
    <p>{{ $returnItem->price_current }}</p>
</div>

<!-- Count Field -->
<div class="col-sm-12">
    {!! Form::label('count',  __('table.count').':') !!}
    <p>{{ $returnItem->count }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at',  __('table.created_at').':') !!}
    <p>{{ $returnItem->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at',  __('table.updated_at').':') !!}
    <p>{{ $returnItem->updated_at }}</p>
</div>

<!-- Complex Product Field -->
<div class="col-sm-12">
    {!! Form::label('productComplex',  __('table.productComplex').':') !!}
    @if($returnItem->isComplexProduct == 1)
        <p>{{ __('table.yes') }}</p>
    @else
        <p>{{ __('table.no') }}</p>
    @endif
</div>
