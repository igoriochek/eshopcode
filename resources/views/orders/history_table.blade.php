<div class="axil-dashboard-order">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="text-center th-col">{{ __('table.date') }}</th>
                    <th scope="col" class="text-center th-col">{{ __('table.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td class="text-center">{{ $log->created_at }}</td>
                    <td class="text-center">{{ $log->activity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .th-col {
        background-color: #0090f0 !important;
        border-color: transparent !important;
        color: #fff !important;
        text-transform: capitalize !important;
    }
</style>