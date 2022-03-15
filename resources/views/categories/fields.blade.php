<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    {!! Form::select('parent_id', $categories, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Visible Field -->
<div class="form-group col-sm-12">
    {!! Form::label('visible', 'Visible', ['class' => 'form-check-label']) !!}
    {!! Form::select('visible', $visible_list, null, ['class' => 'form-control custom-select']) !!}
</div>
