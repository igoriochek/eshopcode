<div class="auth-form">
    {!! Form::model($user, [
        'route' => ['userprofilesave'],
        'method' => 'patch',
        'class' => 'auth-form-container px-0',
    ]) !!}
    <div class="row">
        <div class="form-group col-md-6 col-sm-12 mb-2">
            {!! Form::label('code', __('forms.name') . '*', ['class' => 'form-label required text-dark fw-bold']) !!}
            {!! Form::text('name', $user->name, ['class' => 'form-control py-2']) !!}
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6 col-sm-12 mb-2">
            {!! Form::label('email', __('forms.email') . '*', ['class' => 'form-label required text-dark fw-bold']) !!}
            {!! Form::text('email', $user->email, ['class' => 'form-control py-2']) !!}
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6 col-sm-12 mb-2">
            {!! Form::label('street', __('forms.street'), ['class' => 'form-label required text-dark fw-bold']) !!}
            {!! Form::text('street', $user->street, ['class' => 'form-control py-2']) !!}
        </div>
        <div class="form-group col-md-3 col-sm-6 mb-2">
            {!! Form::label('house_flat', __('forms.house_flat'), ['class' => 'form-label required text-dark fw-bold']) !!}
            {!! Form::text('house_flat', $user->house_flat, ['class' => 'form-control py-2']) !!}
        </div>
        <div class="form-group col-md-3 col-sm-6 mb-2">
            {!! Form::label('post_index', __('forms.post_index'), ['class' => 'form-label required text-dark fw-bold']) !!}
            {!! Form::text('post_index', $user->post_index, ['class' => 'form-control py-2']) !!}
        </div>
        <div class="form-group col-md-6 col-sm-12 mb-2">
            {!! Form::label('city', __('forms.city'), ['class' => 'form-label required text-dark fw-bold']) !!}
            {!! Form::text('city', $user->city, ['class' => 'form-control py-2']) !!}
        </div>
        <div class="form-group col-md-6 col-sm-12 mb-2">
            {!! Form::label('phone_number', __('forms.phone_number'), ['class' => 'form-label required text-dark fw-bold']) !!}
            {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control py-2']) !!}
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
