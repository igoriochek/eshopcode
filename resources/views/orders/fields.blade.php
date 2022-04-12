<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $users_list, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::select('status_id', $statuses_list, null, ['class' => 'form-control custom-select']) !!}
</div>
