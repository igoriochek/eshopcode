{!! Form::model($user, [
    'route' => ['changePassword'],
    'method' => 'post',
    'class' => 'row',
    'class' => 'myaccount-form',
]) !!}
<div class="myaccount-form-inner">
    <div class="single-input">
        {!! Form::label('current_password', __('forms.current_password')) !!}
        {!! Form::password('current_password', ['class' => 'form-control']) !!}
    </div>
    <div class="single-input">
        {!! Form::label('new_password', __('forms.new_password')) !!}
        {!! Form::password('new_password', ['class' => 'form-control']) !!}
    </div>
    <div class="single-input">
        {!! Form::label('new_password_confirmation', __('forms.confirm_password')) !!}
        {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
    </div>
    <div class="single-input">
        <button class="btn btn-custom-size lg-size btn-primary" type="submit">
            <span> {{ __('buttons.save') }} </span>
        </button>
    </div>
</div>
{!! Form::close() !!}
