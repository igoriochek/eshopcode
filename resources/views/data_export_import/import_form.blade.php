{!! Form::open(['route' => 'data_export_import.import',
    'method' => 'POST',
    'files' => true,
    'enctype' => 'multipart/form-data']) !!}
    <div class="form-group mb-5">
        {!! Form::label("table", __('names.table').':', ['class' => 'form-label']) !!}
        {!! Form::select('table',
            $tables,
            null,
            ['class' => 'w-100 form-select', 'placeholder' =>  __('names.select')]) !!}
    </div>
    <div class="form-group mb-3">
        {!! Form::label("upload_file",  __('names.uploadFile').':', ['class' => 'form-label']) !!}
        {!! Form::file('file', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group mb-3">
        {!! Form::submit(__('buttons.import'), ['class' => 'btn btn-primary mt-2']) !!}
    </div>
{!! Form::close() !!}

@push('css')
    <style>
        .form-group input {
            padding: 15px;
        }
        .form-select {
            font-size: 1.4rem;
        }
    </style>
@endpush