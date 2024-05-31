<table class="table table-bordered table-hover">
    <tbody>
        <tr>
            <th>{{ __('table.date') }}</th>
            <th>{{ __('table.action') }}</th>
        </tr>
        @foreach ($logs as $log)
            <tr>
                <td>{{ $log->created_at }}</td>
                <td>{{ $log->activity }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
