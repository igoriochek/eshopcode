<!-- Name Field -->
@foreach (config('translatable.locales') as $locale)
    <div class="form-group col-sm-6">
        {!! Form::label("name_$locale", ''.__('table.name').' '.$locale.':') !!}
        {!! Form::text("name_$locale", ( isset($productSauce) && $productSauce instanceof \App\Models\ProductSauce && isset($productSauce->translate($locale)->name) ? $productSauce->translate($locale)->name : null ) , ['class' => 'form-control']) !!}
    </div>
@endforeach

<!-- productSauce ID Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color',__('table.color').':') !!}
    {!! Form::text('color', isset($productSauce->color) ? $productSauce->$color : null, ['class' => 'form-control']) !!}
</div>

<!-- productSauce ID Field -->
<div class="form-group col-sm-6">
    {!! Form::label('default',__('table.default').':') !!}
    {!! Form::select('default', $default, isset($productSauce->default) ? $productSauce->$default : null, ['class' => 'form-control custom-select']) !!}
</div>