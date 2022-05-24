{!! Form::open(['route' => 'data_export_import.import', 
    'method' => 'POST', 
    'files' => true, 
    'enctype' => 'multipart/form-data']) !!}
    <div class="form-group mb-2">
        {!! Form::label("table", "Table:", ['class' => 'form-label']) !!}
        {!! Form::select('table', 
            $tables, 
            null, 
            ['class' => 'w-100 form-select', 'placeholder' => 'Select']) !!}
    </div>
    <div class="form-group mb-2">
        {!! Form::label("upload_file", "Upload file:", ['class' => 'form-label']) !!}
        </br>
        {!! Form::file('file', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Import', ['class' => 'btn btn-primary mt-2']) !!}
    </div>
{!! Form::close() !!}