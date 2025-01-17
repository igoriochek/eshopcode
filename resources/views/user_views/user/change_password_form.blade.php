{!! Form::model($user, ['route' => ['changePassword'], 'method' => 'post', 'class' => 'row']) !!}
<div class="col-12">
    <div class="input-item">
        {!! Form::label('current_password', __('forms.current_password') )!!}
        {!! Form::password('current_password') !!}
    </div>
</div>
<div class="col-12">
    <div class="input-item">
        {!! Form::label('new_password', __('forms.new_password')) !!}
        {!! Form::password('new_password') !!}
    </div>
</div>
<div class="col-12">
    <div class="input-item">
        {!! Form::label('new_password_confirmation', __('forms.confirm_password')) !!}
        {!! Form::password('new_password_confirmation') !!}
    </div>
</div>
<div class="col-12">
    <div class="input-button">
        <button type="submit" class="bb-btn-2">{{ __('buttons.save') }}</button>
    </div>
</div>
{!! Form::close() !!}