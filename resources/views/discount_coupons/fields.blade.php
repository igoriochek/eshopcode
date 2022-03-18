<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>
<!--Used Field -->
<div class="form-group col-sm-12">
    {!! Form::label('used', 'Used', ['class' => 'form-check-label']) !!}
    {!! Form::select('used', $used_list, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Proc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::number('value', null, ['class' => 'form-control']) !!}
</div>
