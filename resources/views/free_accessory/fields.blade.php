@foreach (config('translatable.locales') as $locale)
    <div class="form-group col-md-6 col-12">
        {!! Form::label("name_$locale", ''.__('table.name').' '.$locale.':') !!}
        {!! Form::text("name_$locale", ( isset($freeAccessory) && $freeAccessory instanceof \App\Models\FreeAccessory && isset($freeAccessory->translate($locale)->name) ? $freeAccessory->translate($locale)->name : null ) , ['class' => 'form-control']) !!}
    </div>
@endforeach
<div class="form-group col-md-6 col-12">
    {!! Form::label('product_id', __('menu.products').':') !!}
    {!! Form::select('product_id', $productList, null, ['class' => 'form-control custom-select']) !!}
</div>
<div class="col-12 d-flex align-items-center gap-2 mt-20">
    {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('paidAccessory.index') }}" class="btn btn-secondary">
        {{ __('buttons.back') }}
    </a>
</div>