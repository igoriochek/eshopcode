{!! Form::model($paidAccessory, ['route' => ['paidAccessory.update', $paidAccessory->id], 'method' => 'patch']) !!}
    @foreach (config('translatable.locales') as $locale)
        <div class="form-group col-12">
            {!! Form::label("name_$locale", __('table.name').' '.strtoupper($locale).':') !!}
            {!! Form::text("name_$locale", $paidAccessory->translate($locale)->name, ['class' => 'form-control']) !!}
        </div>
    @endforeach
    <div class="form-group col-lg-4 col-md-6 col-12">
        {!! Form::label('price', __('table.price').':') !!}
        {!! Form::number('price', number_format($paidAccessory->price, 2), ['class' => 'form-control', 'step' => '0.01']) !!}
    </div>
    <div class="col-12 d-flex align-items-center gap-2 mt-40">
        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('paidAccessory.index') }}" class="btn btn-secondary">
            {{ __('buttons.back') }}
        </a>
    </div>
{!! Form::close() !!}