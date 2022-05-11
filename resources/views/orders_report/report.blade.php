<div class="table-responsive">
    <table id="datatable">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Created Date</th>
                <th>Status</th>
            </tr>
        </thead>
        @foreach ($orders as $order)
        <tbody>
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->status->name }}</td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <th>Price Per Item</th>
                    <th>Count</th>
                    <th>Subtotal</th>
                </tr>
                @foreach ($orderItems as $orderItem)
                    @if ($orderItem->order_id === $order->id)
                        <tr>
                            <td>{{ $orderItem->product->name }}</td>
                            <td>{{ $orderItem->price_current }}</td>
                            <td>{{ $orderItem->count }}</td>
                            <td>{{ $orderItem->subtotal }}</td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <th>Total:</th>
                    <th>{{ $order->total[0]->total_price_current ?? '-' }}</th>
                    <th>{{ $order->total[0]->total_count ?? '-' }}</th>
                    <th>{{ $order->total[0]->total_price ?? '-' }}</th>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>

<style>
    #datatable {
        width: 100%;
        border-collapse: collapse;
        color: black;
    }

    #datatable td,
    #datatable th {
        border: 1px solid rgb(132, 132, 132);
        padding: 10px;
    }

    #datatable thead {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background: rgb(216, 216, 216);
    }

    #datatable tbody tr:nth-child(1) {
        background: rgb(241, 241, 241);
    }
</style>