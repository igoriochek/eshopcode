{{--<!-- Name Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('name', 'Name:') !!}--}}
{{--    {!! Form::text('name', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Description Field -->--}}
{{--<div class="form-group col-sm-12 col-lg-12">--}}
{{--    {!! Form::label('description', 'Description:') !!}--}}
{{--    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


<!-- Name Field -->
@foreach (config('translatable.locales') as $locale)
    <div class="form-group col-sm-6">
        {!! Form::label("name_$locale", ''.__('table.name').' '.$locale.':') !!}
        {!! Form::text("name_$locale", ( isset($product) && isset($product->translate($locale)->name) ? $product->translate($locale)->name : null ) , ['class' => 'form-control']) !!}
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label("description_$locale", ''.__('table.description').' '.$locale.':') !!}
        {!! Form::textarea("description_$locale",  ( isset($product) && isset($product->translate($locale)->description) ? $product->translate($locale)->description : null ), ['class' => 'form-control']) !!}
    </div>
@endforeach

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price',__('table.price').':') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('count', __('table.count').':') !!}
    {!! Form::number('count', null, ['class' => 'form-control']) !!}
</div>


<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image',__('table.image').':') !!}
    <div class="input-group">
        <div class="custom-file d-flex align-items-center">
            <div style="display: flex; justify-content: space-between;">
                {!! Form::file('image', ['class' => 'custom-file-input']) !!}
                <button type="button" class="btn btn-danger" style="font-size: 20px; width: 50px;"  id="clearProductImage">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <span for="image" class="custom-file-label">{{__('buttons.chooseFile')}}</span>
        </div>
    </div>
    {!! Form::hidden('productImageValue', '0', ['id' => 'productImageValue']) !!}
    <div>{!! isset($product->image) ? "<img class=\"img-thumbnail\" id=\"productImageThumbnail\" width=\"200\" src=\"$product->image\">" : ""  !!}</div>
</div>
<div class="clearfix"></div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('complexProductImage',__('table.imageComplex').':') !!}
    <div class="input-group">
        <div class="custom-file d-flex align-items-center">
            <div style="display: flex; justify-content: space-between;">
                {!! Form::file('complexProductImage', ['class' => 'custom-file-input']) !!}
                <button type="button" class="btn btn-danger" style="font-size: 20px; width: 50px;"  id="clearComplexProductImage">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <span for="complexProductImage" class="custom-file-label">{{ __('buttons.chooseFile') }}</span>
        </div>
    </div>
    {!! Form::hidden('complexProductImageValue', '0', ['id' => 'complexProductImageValue']) !!}
    <div>{!! isset($product->complexProductImage) ? "<img class=\"img-thumbnail\" id=\"complexProductImageThumbnail\" width=\"200\" src=\"$product->complexProductImage\">" : ""  !!}</div>
</div>
<div class="clearfix"></div>


<!-- Video Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video', __('table.video').':') !!}
    {!! Form::text('video', null, ['class' => 'form-control']) !!}
</div>

<!-- Visible Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visible', __('table.visible').':') !!}
    {!! Form::select('visible', $visible_list, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Promotion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('promotion_id', __('table.promotionId').':') !!}
    {!! Form::select('promotion_id', $promotions, null, ['class' => 'form-control custom-select', 'placeholder' => '---']) !!}
</div>


<!-- Discount Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount_id', __('table.discountId').':') !!}
    {!! Form::select('discount_id', $discounts, null, ['class' => 'form-control custom-select', 'placeholder' => '---']) !!}
</div>


<!-- Discount Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categories', __('table.categories').':') !!}
    {!! Form::select('categories[]', $categories, null, ['class' => 'form-control custom-select', 'multiple'=>'multiple','name'=>'categories[]']) !!}
</div>


<!-- Included in Complex -->
<div class="form-group col-sm-6">
    {!! Form::label('includedInComplex', __('table.includedComplex').':') !!}
    {!! Form::select('includedInComplex', $included_list, null, ['class' => 'form-control custom-select']) !!}
</div>

<script>
    document.getElementById('clearComplexProductImage').addEventListener('click', function() {
        document.getElementById('complexProductImage').value = '';
        document.getElementById('complexProductImageValue').value = '1';
        document.getElementById('complexProductImageThumbnail').style.display = 'none';
    });

    document.getElementById('clearProductImage').addEventListener('click', function() {
        document.getElementById('image').value = '';
        document.getElementById('productImageValue').value = '1';
        document.getElementById('productImageThumbnail').style.display = 'none';
    });

    document.getElementById('complexProductImage').addEventListener('change', function(event) {
        document.getElementById('complexProductImageValue').value = '0';
    });

    document.getElementById('image').addEventListener('change', function(event) {
        document.getElementById('productImageValue').value = '0';
    });

</script>

<style>
.custom-file {
    display: flex;
    align-items: center;
    width: 100%;
}

.custom-file-input {
    flex: 1;
}

.custom-file-label {
    flex: 1;
    text-align: center;
}

.form-group input {
    padding: 15px;
}

.form-control {
    font-size: 1.4rem;
}
</style>
