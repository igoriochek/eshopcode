@foreach (config('translatable.locales') as $locale)
    <div class="form-group col-12">
        {!! Form::label("name_$locale", ''.__('table.name').' '.$locale.':') !!}
        {!! Form::text("name_$locale", ( isset($productSauce) && $productSauce instanceof \App\Models\ProductSauce && isset($productSauce->translate($locale)->name) ? $productSauce->translate($locale)->name : null ) , ['class' => 'form-control']) !!}
    </div>
@endforeach
<div class="form-group col-md-6 col-12">
    {!! Form::label('color',__('table.color').':') !!}
    {!! Form::text('color', isset($productSauce->color) ? $productSauce->color : null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-md-6 col-12">
    {!! Form::label('default',__('forms.default').':') !!}
    {!! Form::select('default', $default, null, ['class' => 'form-control custom-select']) !!}
</div>
<div class="col-12 d-flex align-items-center gap-2 mt-20">
    {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productSauce.index') }}" class="btn btn-secondary">
        {{ __('buttons.back') }}
    </a>
</div>