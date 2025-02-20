{!! Form::model($user, ['route' => ['changePassword'], 'method' => 'post', 'class' => 'row']) !!}
<div class="col-12">
    {!! Form::label('current_password', __('forms.current_password') )!!}
    {!! Form::password('current_password') !!}
</div>
<div class="col-12">
    {!! Form::label('new_password', __('forms.new_password')) !!}
    {!! Form::password('new_password') !!}
</div>
<div class="col-12">
    {!! Form::label('new_password_confirmation', __('forms.confirm_password')) !!}
    {!! Form::password('new_password_confirmation') !!}
</div>
<div class="col-12">
    <div class="save_button primary_btn default_button">
        <button type="submit">{{ __('buttons.save') }}</button>
    </div>
</div>
{!! Form::close() !!}