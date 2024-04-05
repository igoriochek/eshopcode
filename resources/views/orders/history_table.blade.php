<div class="orders-table table table-responsive">
    <table class="table border">
        <thead>
        <tr>
            <th>{{ __('table.date') }}</th>
            <th>{{ __('table.action') }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->activity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
