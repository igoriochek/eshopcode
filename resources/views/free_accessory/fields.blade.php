<!-- Name Field -->
@foreach (config('translatable.locales') as $locale)
    <div class="form-group col-sm-6">
        {!! Form::label("name_$locale", ''.__('table.name').' '.$locale.':') !!}
        {!! Form::text("name_$locale", ( isset($freeAccessory) && $freeAccessory instanceof \App\Models\FreeAccessory && isset($freeAccessory->translate($locale)->name) ? $freeAccessory->translate($locale)->name : null ) , ['class' => 'form-control']) !!}
    </div>
@endforeach

<!-- Product ID Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id',__('table.product_id').':') !!}
    {!! Form::number('product_id', isset($freeAccessory->product_id) ? $freeAccessory->product_id : 0, ['class' => 'form-control']) !!}
</div>