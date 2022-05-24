{!! Form::open(['route' => 'data_export_import.export', 'method' => 'GET']) !!}
    <div class="form-group mb-2">
        {!! Form::label("table", "Table:", ['class' => 'form-label']) !!}
        {!! Form::select('table', 
            $tables, 
            null, 
            ['class' => 'w-100 form-select', 'placeholder' => 'Select']) !!}
    </div>
    <div class="form-group mb-2">
        {!! Form::label("file_type", "Export as:", ['class' => 'form-label']) !!}
        {!! Form::select('file_type', 
            $file_types, 
            null, 
            ['class' => 'w-100 form-select', 'placeholder' => 'Select']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Export', ['class' => 'btn btn-primary mt-2']) !!}
    </div>
{!! Form::close() !!}