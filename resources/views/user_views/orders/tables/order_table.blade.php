<table class="table table-bordered table-hover">
    <tbody>
        <tr>
            <th>{{ __('names.order') . ' ID' }}</th>
            <th>{{ __('table.status') }}</th>
            <th>{{ __('table.sum') }}</th>
            <th>{{ __('table.date') }}</th>
            <th></th>
        </tr>
        @forelse($orders as $order)
            <tr>
                <td class="account-order-id">{{ $order->order_id }}</td>
                <td>{{ __('status.' . $order->status->name) }}</td>
                <td>€{{ number_format($order->sum, 2) }}</td>
                <td>{{ $order->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('vieworder', [$order->id]) }}" class="btn btn-dark btn-primary-hover rounded-0">
                        <span>{{ __('buttons.view') }}</span>
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
