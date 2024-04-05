{!! Form::model($user, ['route' => ['changePassword'], 'method' => 'post', 'class' => 'row']) !!}
    <div class="form-group col-md-4 col-12">
        {!! Form::label('current_password', __('forms.current_password') )!!}
        {!! Form::password('current_password', ['class' => "form-control"]) !!}
    </div>
    <div class="form-group col-md-4 col-12">
        {!! Form::label('new_password', __('forms.new_password')) !!}
        {!! Form::password('new_password', ['class' => "form-control"]) !!}
    </div>
    <div class="form-group col-md-4 col-12">
        {!! Form::label('new_password_confirmation', __('forms.confirm_password')) !!}
        {!! Form::password('new_password_confirmation', ['class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        <button type="submit" class="default-btn style5" data-loading-text="Loading...">
            {{ __('buttons.save') }}
        </button>
    </div>
{!! Form::close() !!}