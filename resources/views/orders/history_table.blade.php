<div class="axil-dashboard-order">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">{{ __('table.date') }}</th>
                <th scope="col">{{ __('table.action') }}</th>
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
</div>
