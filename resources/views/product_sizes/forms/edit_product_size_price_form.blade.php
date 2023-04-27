{!! Form::model($productSizePrice, ['route' => ['editProductSizePrice', [$productId, $productSizePrice->id]], 'method' => 'patch', 'class' => 'row']) !!}
    <input type="hidden" name="product_id" value="{{ $productId }}">
    <input type="hidden" name="product_size_id" value="{{ $productSizePrice->product_size_id }}">
    <div class="form-group col-12">
        {!! Form::label('price', __('table.price').':') !!}
        {!! Form::number('price', number_format($productSizePrice->price, 2), ['class' => 'form-control', 'step' => '0.01']) !!}
    </div>
    <div class="col-12 d-flex align-items-center gap-2 mt-20">
        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('products.show', $productId) }}" class="btn btn-secondary">
            {{ __('buttons.back') }}
        </a>
    </div>
{!! Form::close() !!}
