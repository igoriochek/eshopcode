{!! Form::model($user, ['route' => ['changePassword'], 'method' => 'post', 'class' => 'row']) !!}
    <div class="form-group col-12">
        {!! Form::label('current_password', __('forms.current_password') )!!}
        {!! Form::password('current_password', ['class' => "form-control"]) !!}
    </div>
    <div class="form-group col-12">
        {!! Form::label('new_password', __('forms.new_password')) !!}
        {!! Form::password('new_password', ['class' => "form-control"]) !!}
    </div>
    <div class="form-group col-12">
        {!! Form::label('new_password_confirmation', __('forms.confirm_password')) !!}
        {!! Form::password('new_password_confirmation', ['class' => "form-control"]) !!}
    </div>
    <div class="form-group mb--40 col-12 d-flex justify-content-center">
        <input type="submit" class="btn btn-dark3 my-4" value="{{ __('buttons.save') }}" data-loading-text="Loading...">
    </div>
{!! Form::close() !!}

<style>
    .form-control {
        height: 40px;
        font-size: 1.5rem;
    }
</style>