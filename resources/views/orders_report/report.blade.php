    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Created Date</th>
                <th>Status</th>
            </tr>
        </thead>
        @forelse ($orders as $order)
        <tbody>
                <tr>
                    <td>{{ $order->id ?? '-' }}</td>
                    <td>{{ $order->user->name ?? '-' }}</td>
                    <td>{{ $order->created_at ?? '-' }}</td>
                    <td>{{ $order->status->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <th>Price Per Item</th>
                    <th>Count</th>
                    <th>Subtotal</th>
                </tr>
                @forelse ($orderItems as $orderItem)
                    @if ($orderItem->order_id === $order->id)
                        <tr>
                            <td>{{ $orderItem->product->name ?? '-' }}</td>
                            <td>{{ $orderItem->price_current ?? '-' }}</td>
                            <td>{{ $orderItem->count ?? '-' }}</td>
                            <td>{{ $orderItem->subtotal ?? '-' }}</td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="8">No order items found</td>
                    </tr>
                @endforelse
                <tr>
                    <th>Total:</th>
                    <th>{{ $order->total[0]->total_price_current ?? '-' }}</th>
                    <th>{{ $order->total[0]->total_count ?? '-' }}</th>
                    <th>{{ $order->total[0]->total_price ?? '-' }}</th>
                </tr>
            </tbody>
        @empty
            <tr>
                <td colspan="8">No orders found</td>
            </tr>
        @endforelse
    </table>

<style>
    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        font-size: 1vw;
    }

    table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    table th,
    table td {
        padding: .625em;
    }

    table th {
        font-size: .85em;
    }

    table thead tr:nth-child(1) {
        background-color: #d4d4d4;
    }

    table tbody tr:nth-child(1) {
        background-color: #e7e7e7;
    }

    table tbody tr:nth-child(2) {
        background-color: #f2f2f2;
    }

    @media screen and (max-width: 1500px) {
        table {
            border: 0;
            font-size: 0.8em;
        }
    }
</style>