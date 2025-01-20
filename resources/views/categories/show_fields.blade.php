<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('table.name')) !!}
    <p class="text-font-size">{{ $category->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('table.description')) !!}
    <p class="text-font-size">{{ $category->description }}</p>
</div>

<!-- Parent Id Field -->
<div class="col-sm-12">
    {!! Form::label('parent_id', __('table.parentId')) !!}
    <p class="text-font-size">{{ $category->parent_id }}</p>
</div>

<!-- Visible Field -->
<div class="col-sm-12">
    {!! Form::label('visible', __('table.visible')) !!}
    <p class="text-font-size">{{ $category->visible }}</p>
</div>

<!-- Included in Complex Field -->
<div class="col-sm-12">
    {!! Form::label('includedInComplex', __('table.includedComplex').':') !!}
    <p class="text-font-size">{{ $category->includedInComplex }}</p>
</div>

<!-- Included in Complex Order Field -->
<div class="col-sm-12">
    {!! Form::label('includedInComplexOrder', __('table.includedInComplexOrder').':') !!}
    <p class="text-font-size">{{ $category->includedInComplexOrder }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('table.created_at')) !!}
    <p class="text-font-size">{{ $category->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('table.updated_at')) !!}
    <p class="text-font-size">{{ $category->updated_at }}</p>
</div>

