<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('table.userId').':') !!}
    {!! Form::select('user_id', $users_list, null, ['class' => 'form-control']) !!}
</div>


<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('table.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', __('table.status').':') !!}
    {!! Form::select('status_id', $statuses_list, null, ['class' => 'form-control']) !!}
</div>


<!-- Admin Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin_id', __('table.adminId').':') !!}
    {!! Form::select('admin_id', $admin_list, null, ['class' => 'form-control']) !!}
</div>

<style>
.form-control {
    font-size: 1.4rem;
    height: 34px;
}
</style>