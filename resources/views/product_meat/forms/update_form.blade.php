{!! Form::model($productMeat, ['route' => ['productMeat.update', $productMeat->id], 'method' => 'patch']) !!}
    @foreach (config('translatable.locales') as $locale)
        <div class="form-group col-12">
            {!! Form::label("name_$locale", __('table.name').' '.strtoupper($locale).':') !!}
            {!! Form::text("name_$locale", $productMeat->translate($locale)->name, ['class' => 'form-control']) !!}
        </div>
    @endforeach
    <div class="form-group col-lg-4 col-12">
        {!! Form::label('default', __('forms.default').':') !!}
        {!! Form::select('default', $default, $productMeat->default, ['class' => 'form-control custom-select']) !!}
    </div>
    <div class="col-12 d-flex align-items-center gap-2 mt-40">
        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('productMeat.index') }}" class="btn btn-secondary">
            {{ __('buttons.back') }}
        </a>
    </div>
{!! Form::close() !!}
