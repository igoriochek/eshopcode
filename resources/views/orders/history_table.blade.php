<table class="table table-start">
    <thead>
       <tr>
            <th scope="col">{{ __('table.date') }}</th>
            <th scope="col">{{ __('table.action') }}</th>
       </tr>
    </thead>
    <tbody>
        @foreach($logs as $log)
            <tr>
                <td data-info="date">{{ $log->created_at }}</td>
                <td data-info="action">{{ $log->activity }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<style>
    .table-start th, .table-start td {
        text-align: start;
        vertical-align: middle;
    }

    .table-start th {
        font-weight: bold;
    }
</style>