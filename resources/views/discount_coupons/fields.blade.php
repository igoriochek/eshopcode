<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('table.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>
<!--Used Field -->
<div class="form-group col-sm-12">
    {!! Form::label('used',__('table.used').':', ['class' => 'form-check-label']) !!}
    {!! Form::select('used', $used_list, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Proc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', __('table.value').':') !!}
    {!! Form::number('value', null, ['class' => 'form-control']) !!}
</div>
