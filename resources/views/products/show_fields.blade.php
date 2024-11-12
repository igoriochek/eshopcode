<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('table.name').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->name }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', __('table.price').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->price }}</p>
</div>

<!-- Count Field -->
<div class="col-sm-12">
    {!! Form::label('count', __('table.count').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->count }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('table.description').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->description }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', __('table.image').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->image }}</p>
</div>

<!-- Visual Image Field -->
<div class="col-sm-12">
    {!! Form::label('complexProductImage',__('table.imageComplex').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->complexProductImage }}</p>
</div>

<!-- Video Field -->
<div class="col-sm-12">
    {!! Form::label('video', __('table.video').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->video }}</p>
</div>

<!-- Visible Field -->
<div class="col-sm-12">
    {!! Form::label('visible', __('table.visible').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->visible }}</p>
</div>

<!-- Promotion Id Field -->
<div class="col-sm-12">
    {!! Form::label('promotion_id',__('table.promotionId').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->promotion_id }}</p>
</div>

<!-- Discount Id Field -->
<div class="col-sm-12">
    {!! Form::label('discount_id', __('table.discountId').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->discount_id }}</p>
</div>

<!-- Included in Complex -->
<div class="col-sm-12">
    {!! Form::label('includedInComplex', __('table.includedComplex').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->includedInComplex }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('table.created_at').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('table.updated_at').':', ['class' => 'text-font-size']) !!}
    <p class="text-font-size">{{ $product->updated_at }}</p>
</div>

<style>
    .text-font-size {
        font-size: 1.7rem !important;
    }
</style>