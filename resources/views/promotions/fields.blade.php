<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name',  __('table.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('table.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start',  __('table.start').':') !!}
    {!! Form::text('start', null, ['class' => 'form-control']) !!}
</div>

<!-- Finish Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finish',  __('table.finish').':') !!}
    {!! Form::text('finish', null, ['class' => 'form-control']) !!}
</div>

