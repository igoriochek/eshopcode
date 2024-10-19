<table class="table table-start">
    <thead>
        <tr>
            <th scope="col">{{ __('names.order').' ID' }}</th>
            <th scope="col">{{ __('table.status') }}</th>
            <th scope="col">{{ __('table.sum') }}</th>
            <th scope="col">{{ __('table.date') }}</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($orders as $order)
        <tr>
            <th scope="row">{{ $order->order_id }}</th>
            <td data-info="status">{{ __("status.".$order->status->name) }}</td>
            <td data-info="sum">€{{ number_format($order->sum, 2) }}</td>
            <td data-info="date">{{ $order->created_at->format('M d, Y') }}</td>
            <td style="text-align: end;">
                <a href="{{ route('vieworder', [$order->id]) }}" class="btn btn-secondary">
                    {{ __('buttons.view') }}
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td class="text-muted" colspan="5">
                {{ __('names.noOrders') }}
            </td>
        </tr>
        @endforelse
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