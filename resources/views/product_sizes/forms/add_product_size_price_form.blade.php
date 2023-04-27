{!! Form::open(['route' => ['addProductSizePrice', $productId], 'class' => 'row']) !!}
    <input type="hidden" name="product_id" value="{{ $productId }}">
    <div class="form-group col-md-6 col-12">
        {!! Form::label('product_size_id', __('names.size').':') !!}
        {!! Form::select('product_size_id', $notAddedProductSizes, null, ['class' => 'form-control custom-select']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('price', __('table.price').':') !!}
        {!! Form::number('price', number_format(0, 2), ['class' => 'form-control', 'step' => '0.01']) !!}
    </div>
    <div class="col-12 d-flex align-items-center gap-2 mt-20">
        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('products.show', $productId) }}" class="btn btn-secondary">
            {{ __('buttons.back') }}
        </a>
    </div>
{!! Form::close() !!}
