<div class="auth-form">
    {!! Form::model($user, [
        'route' => ['updateUserCompany'],
        'method' => 'patch',
        'class' => 'auth-form-container px-0',
    ]) !!}
    <div class="row">
        <div class="form-group col-md-6 col-sm-12 mb-2">
            {!! Form::label('title', __('forms.title'), ['class' => 'form-label required text-dark fw-bold']) !!}
            {!! Form::text('title', $user->company->title ?? '', ['class' => 'form-control py-2']) !!}
            @error('title')
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6 col-sm-12 mb-2">
            {!! Form::label('code', __('footer.companycode'), ['class' => 'form-label required text-dark fw-bold']) !!}
            {!! Form::text('code', $user->company->code ?? '', ['class' => 'form-control py-2']) !!}
            @error('code')
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6 col-sm-12 mb-2">
            {!! Form::label('vat', __('footer.vatcode'), ['class' => 'form-label required text-dark fw-bold']) !!}
            {!! Form::text('vat', $user->company->vat ?? '', ['class' => 'form-control py-2']) !!}
            @error('vat')
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6 col-sm-12 mb-2">
            {!! Form::label('address', __('footer.address'), ['class' => 'form-label required text-dark fw-bold']) !!}
            {!! Form::text('address', $user->company->address ?? '', ['class' => 'form-control py-2']) !!}
            @error('address')
                <span class="invalid-feedback text-danger" role="alert">
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
