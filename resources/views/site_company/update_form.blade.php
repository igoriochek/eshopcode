{!! Form::model($company, ['route' => ['updateSiteCompany'], 'method' => 'patch']) !!}
<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('title', __('forms.title') . ':') !!}
            {!! Form::text('title', $company->title ?? '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('code', __('footer.companycode') . ':') !!}
            {!! Form::text('code', $company->code ?? '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('vat', __('footer.vatcode') . ':') !!}
            {!! Form::text('vat', $company->vat ?? '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('address', __('footer.address') . ':') !!}
            {!! Form::text('address', $company->address ?? '', ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="card-footer">
    {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('editSiteCompany') }}" class="btn btn-default">{{ __('buttons.cancel') }}</a>
</div>
{!! Form::close() !!}
