
<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<!-- Is Cookie Mandatory Field -->
<div class="form-group col-sm-12">
    {!! Form::label('isMandatory', 'Mandatory Status:') !!}
    {!! Form::checkbox('isMandatory',true, true) !!}
</div>
