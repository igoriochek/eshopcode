<div class="auth-form">
    {!! Form::model($user, [
        'route' => ['changePassword'],
        'method' => 'post',
        'class' => 'auth-form-container px-0',
    ]) !!}
    <div class="row">
        <div class="form-group col-md-4 col-sm-12 mb-2">
            {!! Form::label('current_password', __('forms.current_password') . '*', [
                'class' => 'form-label required text-dark fw-bold',
            ]) !!}
            {!! Form::password('current_password', ['class' => 'form-control py-2']) !!}
            @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-4 col-sm-12 mb-2">
            {!! Form::label('new_password', __('forms.new_password') . '*', [
                'class' => 'form-label required text-dark fw-bold',
            ]) !!}
            {!! Form::password('new_password', ['class' => 'form-control py-2']) !!}
            @error('new_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-4 col-sm-12 mb-2">
            {!! Form::label('new_password_confirmation', __('forms.confirm_password') . '*', [
                'class' => 'form-label required text-dark fw-bold',
            ]) !!}
            {!! Form::password('new_password_confirmation', ['class' => 'form-control py-2']) !!}
            @error('new_password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="d-flex mt-4">
            <button type="submit" class="px-4 w-auto py-2 promotion-return-button rounded"
                data-loading-text="Loading...">
                {{ __('buttons.save') }}
            </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
